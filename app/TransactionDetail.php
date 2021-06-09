<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'transaction_id', 'event_id', 'ticket_id', 'price', 'payment_status'
    ];

    public function event(){
        return $this->hasOne(Event::class, 'id', 'event_id');
    }
    public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }
}
