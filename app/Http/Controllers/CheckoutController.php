<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UnregisterCustomer;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductImage;

use App\Models\Tag;
use Illuminate\Http\Request;
use Session;
use PDF;
use Storage;

class CheckoutController extends Controller
{
    public function cartCheckout(){
        Session::put('cartToLogin',1);
        $categories = Category::all();
        $compact = compact('categories');
        return view('website.register',$compact);
    }

    public function checkout()
    {
        if(Session::has('cart')){
            if(count(Session::get('cart')->items)){
                if(auth()->user()){
                    $categories = Category::all();
                    $compact = compact('categories');
                    return redirect()->route('website.billing');
                }
                $categories = Category::all();
                $compact = compact('categories');
                return view('website.checkout',$compact);
            }
        }
        flash('Cart is empty. To checkout add products to cart')->error()->important();
        return redirect()->back();
        
    }

    public function billing()
    {
        if(Session::has('cart'))
        {
            $categories = Category::all();
            $compact = compact('categories');
            return view('website.billing',$compact);
        }
        else
        {
            flash('Cart is empty. To checkout add products to cart')->success()->important();
            return redirect()->route('website.index');
        }
    }

    public function orderStore(Request $request){
        if(Session::has('cart'))
        {
            
            if(!auth()->user())
            {
                $unreg_customer = UnregisterCustomer::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
    
                $order = Order::create([
                    'unreg_customer' => $unreg_customer->id,
                    'reg_customer' => null,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
            }
            elseif(auth()->user()->isCustomer())
            {
                $order = Order::create([
                    'unreg_customer' => null,
                    'reg_customer' => auth()->user()->id,
                    'phone' => $request->phone,
                    'address' => $request->address,
                ]);
                //dd(User::find($order->reg_customer)->first()->name);
                //dd($order->regi_customer()->first()->name);
            }
            
            foreach(Session::get('cart')->items as $item)
            {
                $order->products()->attach($item['item']->id,['quantity' => $item['qty']]);
            }

            $items = Session::get('cart')->items;
            $products = Product::all();
            $total = 0;
            foreach($items as $item){
                foreach($products as $product){
                    if($item['item']->id == $product->id){
                        $total += ($product->price * $item['qty']);
                    }
                }
            }
                        
            $data = [];
            $pdf = PDF::loadView('invoicePDF', compact('unreg_customer', 'order', 'items','products','total'));
            Session::forget('cart');
            flash('Your order is confirmed.')->success()->important();
            return $pdf->download('download.pdf');
        }
        else
        {
            flash('Your order is already confirmed. Add products again for new order')->error()->important();
            return redirect()->route('website.index');
        }

        
        // //self::pdfGen();

        // dd("no no success");
        // Session::forget('cart');
        // return redirect()->route('website.index');

    }

    public function pdfGen()
    {  
        //echo 'asas'; 
        $data = [];
        $pdf = PDF::loadView('invoicePDF', $data);
        echo $pdf = download('invoice.pdf');
        
    }

    public function indexPage()
    {
        $latest_products = Product::latest()->take(5)->get();
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $categories = Category::all();
        $compact = compact('latest_products','product_cover_images','categories');
        dd("ss");
        return view('website.index',$compact);
    }

}
