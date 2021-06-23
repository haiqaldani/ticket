<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'user_id', 'total_price', 'transaction_status', 'code', 'proof_payment'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function transaction_detail(){
        return $this->belongsTo(TransactionDetail::class, 'id', 'transaction_id');
    }
}
