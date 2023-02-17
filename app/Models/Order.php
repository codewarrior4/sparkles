<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'laundry',
        'pick_up_address',
        'pick_up_date',
        'pick_up_time',
        'payment_method',
        'payment_status',
        'order_status',
        'txnid',
        'refno',
        'total'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    
}
