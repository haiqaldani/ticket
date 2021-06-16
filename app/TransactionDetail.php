<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'transaction_id', 'ticket_id', 'price', 'payment_status', 'quantity', 'status'
    ];

    public function ticket(){
        return $this->hasOne(Ticket::class, 'id', 'ticket_id');
    }
    public function transaction(){
        return $this->hasOne(Transaction::class, 'id', 'transaction_id');
    }
}
