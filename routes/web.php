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

// Website checkout route
// Route::get('checkout','WelcomeController@checkout')->name('website.checkout');

//Website register route
Route::get('login-register','WelcomeController@register')->name('website.register');

//Website categorywise products route
Route::get('products/category={category}','WelcomeController@categorywiseProducts')->name('website.categorywiseProducts');

//Website filtered products route
Route::get('products','WelcomeController@filteredProducts')->name('website.filteredProducts');

//Website searched products route
Route::get('products/search','WelcomeController@searchedProducts')->name('website.searchedProducts');

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


                        //Checkout Routes//

//Route::get('checkoutt','CheckoutController@cartCheckout')->name('checkout');
Route::get('checkout','CheckoutController@checkout')->name('website.checkout');

//Billing Form
Route::get('checkout/billing','CheckoutController@billing')->name('website.billing');

Route::get('checkout/confirm','CheckoutController@orderStore')->name('website.checkout.confirm');


Route::get('checkout/invoice','CheckoutController@pdfGen')->name('website.checkout.invoice');



                    //Admin Routes//

//Admin landing route
//Route::get('admin-index','AdminController@index')->name('admin.index');

//Admin Product List
Route::resource('adminProducts','Admin\AdminProductController');
Route::get('adminProducts/delete/{id}','Admin\AdminProductController@delete')->name('adminProducts.delete');
//Admin Category List
Route::resource('adminCategories','Admin\AdminCategoryController');

//Admin Tag List
Route::resource('adminTags','Admin\AdminTagController');

//Admin Orders
Route::get('adminOrders','Admin\AdminOrderController@index')->name('adminOrders.index');
Route::get('adminOrder/show/{id}','Admin\AdminOrderController@show')->name('adminOrders.show');


                //Customer Routes//

Route::get('Orders','Customer\CustomerOrderController@index')->name('customerOrders.index');
Route::get('Order/{id}','Customer\CustomerOrderController@show')->name('customerOrders.show');



Route::get('test1',function(){
    $categories = App\Models\Category::all();
    $compact = compact('categories');
    return view('website.invoice',$compact);
});
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
