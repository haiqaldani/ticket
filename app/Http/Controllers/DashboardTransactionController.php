<?php

namespace App\Http\Controllers;

use App\Event;
use App\Fund;
use App\Ticket;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index()
    {

        $sellItems = Event::with(['ticket', 'fund'])->where('user_id', Auth::user()->id)->get();
        return view('pages.dashboard-transaction', [
            'sellItems' => $sellItems,
            // 'totalquantity' => $totalquantity
        ]);
    }

    public function mytransaction()
    {

        $items = TransactionDetail::with(['transaction.user', 'ticket'])->whereHas('transaction', function ($transaction) {
            $transaction->where('user_id', Auth::user()->id);
        })->get();

        // $items = Ticket::with(['transaction_detail.transaction', 'event'])->whereHas('event', function ($event){
        //     $event->where('user_id', Auth::user()->id);
        // })->get();

        return view('pages.dashboard-mytransaction', [
            'items' => $items
        ]);
    }

    public function proofpayment($id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.proofpayment', [
            'item' => $item
        ]);
    }

    public function processpayment(Request $request, $id)
    {
        $data = $request->all();
        $data['proof_payment'] = $request->file('proof_payment')->store( 'assets/payment','public');
        $data['transaction_status'] = 'PROCESS';

        $item = Transaction::findOrFail($id);
        $item->update($data);
        return redirect()->route('dashboard-mytransaction');
    }

    public function processfund(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'PROCESS';

        Fund::create($data);
        return redirect()->route('dashboard-transaction');
    }
}
