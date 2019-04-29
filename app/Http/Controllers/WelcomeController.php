<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $latest_products = Product::latest()->take(12)->get();
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $categories = Category::all();
        $compact = compact('latest_products','product_cover_images','categories');
        return view('website.index',$compact);
    }

    

    public function checkout()
    {
        
        if(Session::has('cart')){
            if(count(Session::get('cart')->items)){
                $categories = Category::all();
                $compact = compact('categories');
                return view('website.checkout',$compact);
            }
        }
        
    }

    public function register()
    {
        $categories = Category::all();
        $compact = compact('categories');
        return view('website.register',$compact);
    }

    public function categorywiseProducts($categoryId)
    {
        $categories = Category::all();
        $clickedCategory = Category::where('id',$categoryId)->first();
        $allProduct = Product::all();
        $price = 'null';
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $compact = compact('clickedCategory','categories','product_cover_images','price');
        
        return view('website.products',$compact);
    }

    public function filteredProducts(Request $req)
    {
        $categories = Category::all();
        $allProduct = Product::all();
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        //Only category Filter
        if($req->filter_category != null && $req->filter_price == 'null'){
            $price = 'null';
            $clickedCategory = Category::where('id',$req->filter_category)->first();
            $compact = compact('clickedCategory','categories','product_cover_images','price');
            return view('website.products',$compact);
        }
        //Only Price Filter
        if($req->filter_category == 'null' && $req->filter_price != null){
            $minPrice = null;
            $maxPrice = null;
            $clickedCategory = 'null';
            $price = $req->filter_price;
            //if price has min and max limit
            if(strpos($req->filter_price, '-') !== false) {
                $priceSplit = explode("-",$req->filter_price);
                $minPrice = (int)$priceSplit[0];
                $maxPrice = (int)$priceSplit[1];
                $priceFilteredProducts = Product::whereBetween('price',array($minPrice,$maxPrice))->get();
                $compact = compact('priceFilteredProducts','categories','product_cover_images','minPrice','maxPrice','clickedCategory','price');
                return view('website.products',$compact);
            }
            //if price has only min limit 
            elseif(strpos($req->filter_price, '+') !== false){
                $priceSplit = explode("+",$req->filter_price);
                $minPrice = (int)$priceSplit[0];
                $priceFilteredProducts = Product::where('price','>=',$minPrice)->get();
                $compact = compact('priceFilteredProducts','categories','product_cover_images','minPrice','maxPrice','clickedCategory','price');
                return view('website.products',$compact);
            }
        }       
        //For both Filter
        if($req->filter_category != null && $req->filter_price != null){
            $minPrice = null;
            $maxPrice = null;
            $clickedCategory = Category::where('id',$req->filter_category)->first();
            //dd($clickedCategory->products);
            $price = $req->filter_price;
            //if price has min and max limit
            if(strpos($req->filter_price, '-') !== false) {
                $priceSplit = explode("-",$req->filter_price);
                $minPrice = (int)$priceSplit[0];
                $maxPrice = (int)$priceSplit[1];
                $compact = compact('categories','product_cover_images','minPrice','maxPrice','clickedCategory','price');
                return view('website.products',$compact);
            }
            //if price has only min limit 
            elseif(strpos($req->filter_price, '+') !== false){
                $priceSplit = explode("+",$req->filter_price);
                $minPrice = (int)$priceSplit[0];
                $maxPrice = null;
                $i = 0;
                $compact = compact('priceFilteredProducts','categories','product_cover_images','minPrice','maxPrice','clickedCategory','price');
                return view('website.products',$compact);
            }
        }
    }

    public function searchedProducts(Request $req)
    {
        $categories = Category::all();
        $searchKey = $req->searchKey;
        $searchedTag = Tag::where('name',$req->searchKey)->first();
        $searchedProducts = Product::where('name','like',"%$searchKey%");
        $product_cover_images = ProductImage::where('cover_image','1')->get();
        $compact = compact('categories','searchedTag','searchedProducts','searchKey','product_cover_images');
        return view('website.search',$compact);
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        $product_images = ProductImage::where('product_id',$id)->get();
        $categories = Category::all();
        $compact = compact('product','product_images','categories');
        return view('website.product_details',$compact);
    }
}
