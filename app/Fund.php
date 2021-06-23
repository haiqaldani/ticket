<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fund extends Model
{
    use SoftDeletes;

    protected $fillable = [
       'event_id' ,'total_price'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'id', 'event_id');
    }
}
