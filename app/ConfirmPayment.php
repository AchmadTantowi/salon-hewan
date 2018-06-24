<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmPayment extends Model
{
    protected $fillable = [
        'user_id', 'bank_account', 'account_number', 'amount', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
