<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $fillable = [
        'wo_number', 'instruction_from', 'instruction_to', 'order_id', 'notes'
    ];

    public function from()
    {
        return $this->belongsTo('App\User', 'instruction_from');
    }

    public function to()
    {
        return $this->belongsTo('App\User', 'instruction_to');
    }


}
