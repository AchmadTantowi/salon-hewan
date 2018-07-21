<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'order_id', 'user_id', 'title', 'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
