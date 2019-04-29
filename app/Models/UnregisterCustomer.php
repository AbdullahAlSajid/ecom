<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnregisterCustomer extends Model
{
    protected $table = 'unreg_customers';
    protected $guarded = [];

    public function order()
    {
        return $this->hasOne(Order::class,'unreg_customer','id');
    }
}
