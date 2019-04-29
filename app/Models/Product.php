<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class,'product_categories','product_id','category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_products','product_id','order_id')
                ->withPivot('quantity');
    }
}
