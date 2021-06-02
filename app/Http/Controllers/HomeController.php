<?php

namespace App\Http\Controllers;

use App\Banner;
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
        $items = Banner::with('event', 'blog')->get();
        return view('pages.home',[
            'items' => $items
        ]);
    }
}
