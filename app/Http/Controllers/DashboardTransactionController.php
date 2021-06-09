<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index(){

        $sellItems = TransactionDetail::with(['transaction.user', 'ticket.event'])
        ->whereHas('event', function($event){
            $event->where('user_id', Auth::user()->id);
        })->get();

        return view('pages.dashboard-transaction',[
            'sellItems' => $sellItems
        ]);
    }
}
