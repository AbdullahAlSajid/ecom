<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

                    //Website Routes//
//Website landing route
Route::get('/','WelcomeController@index')->name('website.index');

//Website cart route
Route::get('cart','WelcomeController@cart')->name('website.cart');

//Website checkout route
Route::get('checkout','WelcomeController@checkout')->name('website.checkout');

//Website register route
Route::get('login-register','WelcomeController@register')->name('website.register');

//Website products route
Route::get('products','WelcomeController@products')->name('website.products');

//Website contact route
Route::get('contact','WelcomeController@contact')->name('website.contact');

//Website product_details route
Route::get('product_details/product={id}','WelcomeController@product_details')->name('website.product_details');



                            //Cart Routs//
//add-to-cart
Route::get('add-to-cart/product={id}','CartController@getAddToCart')->name('cart.add-to-cart');

//show cart
Route::get('cart','CartController@getCart')->name('cart.getCart');

//update cart
Route::get('cart/update/{id}/{qty}','CartController@updateCart')->name('cart.updateCart');

//remove from cart
Route::get('cart/remove/{id}','CartController@removeCart')->name('cart.removeCart');


                    //Admin Routes//

//Admin landing route
//Route::get('admin-index','AdminController@index')->name('admin.index');

//Admin Product List
Route::resource('adminProducts','Admin\AdminProductController');

//Admin Category List
Route::resource('adminCategories','Admin\AdminCategoryController');



//Test Route
Route::get('test',function (){

//    $user = App\Models\User::where('id',6)->get();
//    dd($user->name);
//    foreach ($user->roles as $role)
//    {
//        echo $role->name;
//    }

    //$user = App\Models\Role::where('name','Customer')->first();
    //auth()->user()->roles
    // $user = \App\Models\User::find(21);
    // //dd($user->roles->first()->name);
    // foreach ($user->roles as $role) {
    //     echo $role->name;
    // }
    //dd(Session::get('cart'));
    Session::forget('cart');
});

Route::get('log-out',function (){
   auth()->logout();
});
