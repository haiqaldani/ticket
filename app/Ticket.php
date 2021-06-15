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

    public function cart(){
        return $this->belongsTo( Cart::class, 'id', 'ticket_id' );
    }

    public function user(){
        return $this->hasOne( User::class, 'id', 'user_id');
    }

    public function transaction_detail(){
        return $this->belongsTo( transaction_detail::class, 'id', 'ticket_id' );
    }
}
