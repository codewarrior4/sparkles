<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaundryItem extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'wash_price',
        'washiron_price',
        'starchiron_price',
        'complete_price'
    ];
}
