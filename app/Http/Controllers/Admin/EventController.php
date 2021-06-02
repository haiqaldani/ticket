<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(){
        $items = Event::all();
        return view('pages.admin.event.index',[
            'items' => $items
        ]);
    }

    public function create(){
        return view('pages.admin.event.create');
    }

    public function store(EventRequest $request){

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $data['banner'] = $request->file('banner')->store('assets/banner', 'public');
        Event::create($data);

        return redirect()->route('event.index');
    }

    public function view(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){
        
    }
}
