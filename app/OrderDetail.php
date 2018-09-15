<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'order_detail_id';

    protected $fillable = [
        'order_id', 'product_id', 'qty', 'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
