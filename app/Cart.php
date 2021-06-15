<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'ticket_id', 'quantity'
    ];

    public function ticket(){
        return $this->hasOne( Ticket::class, 'id', 'ticket_id' );
    }

    public function user(){
        return $this->belongsTo( User::class, 'users_id', 'id');
    }
}
