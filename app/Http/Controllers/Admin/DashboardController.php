<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = User::where('roles', 'USER')->count();
        $event = Event::count();
        $ticket = Ticket::count();
        $transaction = Transaction::count();
        return view('pages.admin.dashboard',[
            'user' => $user,
            'event' => $event,
            'ticket' => $ticket,
            'transaction' => $transaction,
        ]);
    }
}
