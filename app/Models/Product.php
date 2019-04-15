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
}
