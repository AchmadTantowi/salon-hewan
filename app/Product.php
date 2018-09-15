<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name', 'description', 'price','image'
    ];

    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetail', 'product_id');
    }
}
