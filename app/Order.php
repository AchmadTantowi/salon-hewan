<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id', 'status', 'alamat_order', 'total', 'notes'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
