<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Event;
use App\Http\Requests\TicketRequest;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DashboardTicketController extends Controller
{

    public function index()
    {
        $items = Ticket::with(['event'])->get();
        return view('pages.dashboard-ticket', [
            'items' => $items
        ]);
    }

    public function add($id)
    {
        $item = Event::findOrFail($id);
        return view('pages.dashboard-event-ticket', [
            'item' => $item
        ]);
    }

    public function store(TicketRequest $request)
    {

        $data = $request->all();
        Ticket::create($data);

        return redirect()->route('dashboard-ticket');
    }



    public function edit($id)
    {
    }
    public function destroy($id)
    {

        $item = Ticket::findorFail($id);
        $item->delete();

        return redirect()->route('dashboard-ticket-delete');
    }
}
