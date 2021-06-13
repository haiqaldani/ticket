<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class DetailEventController extends Controller
{
    public function index($slug){
        
        $item = Event::where('slug', $slug)->with('ticket', 'user')->firstOrFail();

        return view('pages.detail-event', [
            'item' => $item
        ]);
    }
}
