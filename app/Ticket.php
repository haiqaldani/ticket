<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'ticket_name', 'event_id', 'price', 'quantity', 'expired_ticket', 'description'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
}
