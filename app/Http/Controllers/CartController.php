<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function getAddToCart(Request $req, $id){
        $product = Product::findOrFail($id);
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }
        else{
            $oldCart = null;
        }
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        Session::put('cart',$cart); 
        //dd(Session::get('cart'));
        return redirect()->route('website.index');
    }

    public function getCart(){
        $product = null;
        if(!Session::has('cart')){
            return view('website.cart',compact('product'));
        }
        
        $products = Session::get('cart');
        //Session::forget('cart');
        // foreach($products->items as $item)
        // {
        //     dd($item['item']->id);
        // }
        //dd($products);
        //=dd(Product::all());
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $categories = Category::all();
        $compact = compact('products','product_cover_images','categories');
        return view('website.cart', $compact);
    }


    public function updateCart($id, $qty){

        $product = Product::findOrFail($id);
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }
        else{
            $oldCart = null;
        }
        $cart = new Cart($oldCart);
        $cart->update($product,$id,$qty);
        Session::put('cart',$cart);
        
        $cart = Session::get('cart');

        echo $cart->totalPrice;
  
    }

    public function removeCart($id){
        $product = Product::findOrFail($id);
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
        }
        else{
            $oldCart = null;
        }
        $cart = new Cart($oldCart);
        $cart->remove($product,$id);
        $cart = Session::put('cart',$cart);
        $cart = Session::get('cart');

        echo $cart->totalPrice;
    }

}
