<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->isAdmin())
        {
            $orders = Order::all();
            $products = Product::all();
            $users = User::all();
            $total = 0;
            foreach($orders as $order){
                foreach($order->products as $item){
                    foreach($products as $product){
                        if($item->id == $product->id){
                            $total += ($product->price * $item->pivot->quantity);
                        }
                    }
                }
            }
            $tQ = 0;
            //dd(count($products));
            //dd($total);
            //dd(count($orders));
            $compact = compact('orders','products','users','total');
            return view('admin.index',$compact);
        }
        elseif (auth()->user()->isCustomer())
        {
            if(Session::has('cart')){
                if(count(Session::get('cart')->items)){
                    return redirect()->route('website.billing');
                }
            }
            return view('customer.index');
        }
        else
        {
            auth()->logout();
            return redirect()->route('website.register');
        }

    }
}
