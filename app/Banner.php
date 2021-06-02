<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id', 'blog_id'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }
    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
