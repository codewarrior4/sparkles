<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $table ='laundries';
    protected $fillable = [
        'customer_id',
        'laundry_item_id',
        'laundry_type',
        'laundry_item_name',
        'quantity',
        'price',
        'total',
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
    
}
