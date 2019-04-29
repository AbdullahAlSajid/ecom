<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $compact = compact('products');
        return view('admin.products.list',$compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $compact = compact('categories','tags');
        return view('admin.products.create-form',$compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Create products*/

        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'cover_photo' => 'required',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'sku' => random_int(100000, 999999),
            'description' => $request->description,
            'product_status_id' => 1,
            'price' => $request->price,
            'quantity' => $request->quantity,

        ]);

        /*Create products_categories*/
        if ($request->has('categories') && !empty($request->categories)) {
            $product->categories()->attach($request->categories);
        }

        /*Create products_tags*/
        if ($request->has('tags') && !empty($request->tags)) {
            $product->tags()->attach($request->tags);
        }

        /*Creating file paths for cover photo and deails photos*/
        $cover_photo_path = ($request->hasFile('cover_photo')) ? $request->file('cover_photo')->store('uploads/products') : null;
        $details_photo1_path = ($request->hasFile('details_photo1')) ? $request->file('details_photo1')->store('uploads/products') : null;
        $details_photo2_path = ($request->hasFile('details_photo2')) ? $request->file('details_photo2')->store('uploads/products') : null;

        $cover_photo = ProductImage::create([
            'product_id' => $product->id,
            'image' => $cover_photo_path,
            'cover_image' => true
        ]);

        $details_photo1 = ProductImage::create([
            'product_id' => $product->id,
            'image' => $details_photo1_path,
        ]);

        $details_photo2 = ProductImage::create([
            'product_id' => $product->id,
            'image' => $details_photo2_path,
        ]);
        flash('New Product Added.')->success()->important();
        return redirect(route('adminProducts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $compact = compact('product','categories','tags');
        return view('admin.products.show',$compact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        // foreach($categories as $category){
        //     foreach($product->categories as $pc)
        //     {
        //         if($pc->id == $category->id)
        //         {
        //             $i++;
        //         }
        //     }
            
        // }
        // dd($i);
        
        $compact = compact('product','categories','tags');
        return view('admin.products.edit',$compact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $product->name = $req->name;
        $product->price = $req->price;
        $product->quantity = $req->quantity;
        $product->description = $req->description;
        $product->save();

        if ($req->has('categories') && !empty($req->categories)) {
            $product->categories()->sync($req->categories);
        }

        if ($req->has('tags') && !empty($req->tags)) {
            $product->tags()->sync($req->tags);
        }
        
        flash('Product Updated successfully.')->success()->important();
        return redirect()->route('adminProducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        flash("Can't Delete this product. It has been already ordered.")->error()->important();
        return redirect()->back();
    }
}
