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

        $data['slug'] = Str::slug($request->title);
        $data['banner'] = $request->file('banner')->store('assets/banner', 'public');
        Event::create($data);

        return redirect()->route('event.index');
    }

    public function view(){

    }

    public function edit($id){
        $item = Event::findorFail($id);

        return view('pages.admin.event.edit',[
            'item' => $item
        ]);
    }

    public function update(EventRequest $request, $id){
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['image'] = $request->file('image')->store(
            'assets/event', 'public'
        );

        $item = Event::findOrFail($id);

        $item->update($data);
        return redirect()->route('event.index');
    }

    public function destroy($id){
        $item = Event::findorFail($id);
        $item->delete();

        return redirect()->route('event.index');
    }
}
