<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_blog_id', 'image', 'category'
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_blog_id', 'id');
    }
    public function blog(){
        return $this->belongsTo(Blog::class, 'event_blog_id', 'id');
    }
}
