<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'status',
        'isverified'
    ];

    public function notifications(){
        return $this->hasMany('App\Models\Notifications','custoner_id');
    }

    public function orders(){
        return $this->hasMany('App\Models\Order','customer_id');
    }

    public function laundry(){
        return $this->hasMany('App\Models\Laundry','customer_id');
    }

    public function tickets(){
        return $this->hasMany('App\Models\Tickets','customer_id');
    }
    


    public function getFullNameAttribute(){
        return $this->firstname.' '.$this->lastname;
    }
    
}
