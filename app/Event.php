<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'banner', 'address', 'slug', 'term_and_conditions', 'description', 'venue_name', 'city', 'event_type', 'category_event', 'link'
    ];

    public function banner(){
        return $this->hasOne(Event::class, 'event_id', 'id');
    }
    public function ticket(){
        return $this->hasMany(Ticket::class, 'event_id', 'id');
    }

}
