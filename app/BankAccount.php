<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $primaryKey = 'bank_account_id';

    protected $fillable = [
        'bank_name', 'account_number', 'account_name'
    ];
}
