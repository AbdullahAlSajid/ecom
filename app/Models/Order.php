<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_products','order_id','product_id')
                ->withPivot('quantity');
    }

    public function regi_customer()
    {
        return $this->belongsTo(User::class,'reg_customer','id');
    }

    public function unregi_customer()
    {
        return $this->belongsTo(UnregisterCustomer::class,'unreg_customer','id');
    }
}
