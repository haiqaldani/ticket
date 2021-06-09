<?php

namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardEventController extends Controller
{
    public function index(){
        $events = Event::where('user_id', '=', Auth::user()->id)->get();
        return view('pages.dashboard-event',[
            'events' => $events
        ]);
    }

    public function create(){
        
        return view('pages.dashboard-event-create');
    }

    public function store(){

    }

    public function detail(Request $request, $id){
        $event = Event::with('ticket')->findOrFail($id);
        return view('pages.dashboard-event-detail',[
            'event' => $event
        ]);
    }

    public function update(EventRequest $request, $id)
    {
        $data = $request->all();

        $item = Event::findOrFail($id);

        $data['slug'] = Str::slug($request->title);

        $item->update($data);

        return redirect()->route('dashboard-event');
    }
}
