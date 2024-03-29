<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerVerification extends Model
{
    use HasFactory;
    protected $table = 'customers_verification';
    protected $fillable = ['email','token'];
}
