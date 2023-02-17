<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketSub extends Model
{
    use HasFactory;

    protected $table = 'ticket_subs';

    protected $fillable = ['ticket_id','reply','isadmin'];

    public function ticket()
    {
        return $this->belongsTo(Tickets::class);
    }
    
}
