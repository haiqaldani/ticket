<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    
    public function banner(){
        return $this->hasOne(Event::class, 'event_id', 'id');
    }
}
