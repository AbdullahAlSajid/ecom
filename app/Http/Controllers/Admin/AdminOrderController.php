<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Controllers\Controller;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::all();
        $compact = compact('orders');
        // foreach($orders as $order)
        // {
        //     if($order->reg_customer != null)
        //     {
        //         dd($order->regi_customer->name);
        //     }
        // }
        //dd($orders);
        return view('admin.orders.list',$compact);
    }

    public function show($id)
    {
        $order = Order::find($id);
        //dd($id);
        $products = Product::all();
        $total = 0;
        foreach($order->products as $item){
            foreach($products as $product){
                if($item->id == $product->id){
                    $total += ($product->price * $item->pivot->quantity);
                }
            }
        }
        $compact = compact('order','products','total');
        return view('admin.orders.show',$compact);
    }
}
