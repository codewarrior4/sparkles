<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable =['customer_id','subject','message','status','priority','ticket_id'];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function ticket_subs()
    {
        return $this->hasMany(TicketSub::class);
    }
}
