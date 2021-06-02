<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificationData extends Model
{

    public $table = "verification_datas";

    public function user(){
        return $this->hasOne(User::class, 'verification_id', 'id');
    }
}
