<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'status', 'alamat_order', 'total', 'notes'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
