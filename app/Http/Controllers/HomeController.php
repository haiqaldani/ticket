<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Banner::with('event', 'blog')->take(6)->get();
        $events = Event::take(8)->get();
        return view('pages.home',[
            'items' => $items,
            'events' => $events
        ]);
    }
}
