<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index(){

        $sellItems = TransactionDetail::with(['transaction.user', 'ticket.event'])->get();

        // ->whereHas('transaction', function($transaction){
        //     $transaction->where('user_id', Auth::user()->id);})

        return view('pages.dashboard-transaction',[
            'sellItems' => $sellItems
        ]);
    }

    public function mytransaction(){

        $items = Transaction::with(['user'])->where('user_id', Auth::user()->id)->get();

        return view('pages.dashboard-mytransaction',[
            'items' => $items
        ]);
    }

    public function proofpayment($id){

        $item = Transaction::findOrFail($id);
        return view('pages.dashboard-proofpayment',[
            'item' => $item
        ]);
    }

    public function processpayment(Request $request,$id){

        $data = $request->all();
        $data['proof_payment'] = $request->file('proof_payment')->store(
            'assets/payment', 'public'
        );
        $data['transaction_status'] = 'PROCESS';

        $item = Transaction::findOrFail($id);

        $item->update($data);
        return redirect()->route('dashboard-mytransaction');
    }

   
}
