<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerificationData extends Model
{
    use SoftDeletes;

    public $table = "verification_datas";

    protected $fillable = [
        'id_card_photo', 'id_card', 'name', 'address', 'status'
     ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'verification_id');
    }
}
