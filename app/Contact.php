<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'name', 'email', 'subject', 'message'
    ];
}
