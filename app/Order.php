<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'status', 'total'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
