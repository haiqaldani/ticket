<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'banner', 'address', 'slug', 'term_and_conditions', 'description', 'venue_name', 'city', 'event_type', 'category_event', 'link', 'user_id', 'start_on_date', 'until_date', 'start_at', 'until_time'
    ];

    public function banner(){
        return $this->hasOne(Event::class, 'event_blog_id', 'id');
    }
    public function ticket(){
        return $this->hasMany(Ticket::class, 'event_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function fund(){
        return $this->belongsTo(Fund::class, 'id', 'event_id');
    }

}
