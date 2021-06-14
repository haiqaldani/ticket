<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailEventController extends Controller
{
    public function index($slug){
        
        $item = Event::where('slug', $slug)->with('ticket', 'user')->firstOrFail();
        $user = Auth::user()->id;
        return view('pages.detail-event', [
            'item' => $item,
            'user' => $user
        ]);
    }
}
