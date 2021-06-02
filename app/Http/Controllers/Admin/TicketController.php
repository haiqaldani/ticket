<?php

namespace App\Http\Controllers\Admin;

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

    public function create($id){
        //
    }

    public function store(TicketRequest $request){
        $data = $request->all();

        Ticket::create($data);

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
