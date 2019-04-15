<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $latest_products = Product::latest()->take(4)->get();
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $compact = compact('latest_products','product_cover_images');
        return view('website.index',$compact);
    }

    public function cart()
    {
        return view('website.cart');
    }

    public function checkout()
    {
        return view('website.checkout');
    }

    public function register()
    {
        return view('website.register');
    }

    public function products()
    {
        return view('website.products');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        $product_images = ProductImage::where('product_id',$id)->get();
        $compact = compact('product','product_images');
        return view('website.product_details',$compact);
    }
}
