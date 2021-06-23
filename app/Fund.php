<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'event_id' ,'total_price' , 'status'
    ];

    public function event(){
        return $this->hasOne(Event::class, 'id', 'event_id');
    }
}
