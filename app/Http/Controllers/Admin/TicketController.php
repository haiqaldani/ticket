<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TicketRequest;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $items = Ticket::all();
        return view('pages.admin.ticket.index',[
            'items' => $items
        ]);
    }

    public function addticket($id){
        $item = Event::findorFail($id);

        return view('pages.admin.event.add-ticket',[
            'item' => $item
        ]);
    }

    public function store(TicketRequest $request){
        $data = $request->all();

        Ticket::create($data);

        return redirect()->route('ticket.index');
    }

    public function view(){

    }

    public function edit($id){
        $item = Ticket::findorFail($id);

        return view('pages.admin.ticket.edit',[
            'item' => $item
        ]);
    }

    public function update(TicketRequest $request, $id){
        $data = $request->all();
        $item = Ticket::findOrFail($id);

        $item->update($data);
        return redirect()->route('ticket.index');
    }

    public function destroy($id){
        $item = Ticket::findorFail($id);
        $item->delete();

        return redirect()->route('banner.index');
    }

}
