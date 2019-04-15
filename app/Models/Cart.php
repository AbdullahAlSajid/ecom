<?php

namespace App\Models;


class Cart 
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice =0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];  
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function update($item,$id, $qty){

        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        $perviousQty = 0;
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                $perviousQty = $storedItem['qty'];
            }
        }
        $storedItem['qty'] = $qty;
        $storedItem['price'] = $item->price * $storedItem['qty'];  
        $this->items[$id] = $storedItem;
        $this->totalQty += ($storedItem['qty'] - $perviousQty);
        $this->totalPrice += $item->price * ($storedItem['qty'] - $perviousQty); 
    }

    public function remove($item,$id){
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
                unset($this->items[$id]);
            }
        }
        $storedItem['price'] = $item->price * $storedItem['qty'];  
        $this->totalQty -= 1;
        $this->totalPrice -= $storedItem['price'];
        //dd($this->totalPrice);   
    }
}
