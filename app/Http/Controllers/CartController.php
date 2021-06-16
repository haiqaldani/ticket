<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Ticket;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // foreach ($request->input('quantity') as $i => $quantity) {
        //     $time = Carbon::now()->toDateTimeString();
        //     if ($quantity != 0) {
        //         $store_ticket = array(
        //             'user_id' => Auth::user()->id,
        //             'ticket_id' => $request->ticket_id[$i],
        //             'quantity' => $quantity,
        //             'updated_at' =>  $time,
        //             'created_at' =>  $time,
        //         );

        //         $total = Ticket::find($request->ticket_id[$i]);
        //         $total->update(['quantity' => $total->quantity - $quantity]);

        //         Cart::insert($store_ticket);
        //     }
        // }

        $code = 'INV-' . mt_rand(0000, 9999);

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'transaction_status' => 'PENDING',
            'code' => $code
        ]);

        foreach ($request->input('quantity') as $i => $quantity) {
            $time = Carbon::now()->toDateTimeString();
            $price = $request->price;
            $tkt = 'TKT-' . mt_rand(00000, 99999);
            if ($quantity != 0) {
                $store_transaction = array(
                    'transaction_id' => $transaction->id,
                    'ticket_id' => $request->ticket_id[$i],
                    'quantity' => $quantity,
                    'price' => $price[$i],
                    'code' => $tkt,
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                );

                $total = Ticket::find($request->ticket_id[$i]);
                $total->update(['quantity' => $total->quantity - $quantity]);

                TransactionDetail::insert($store_transaction);
            }
        }
        return redirect()->route('checkout', $transaction->id);
    }

    public function checkout()
    {
        $carts = TransactionDetail::with(['ticket.event.user', 'transaction'])->whereHas('transaction', function ($transaction) {
            $transaction->where('user_id', Auth::user()->id)->where('transaction_status', 'PENDING');
        })->get();

        // ->where('user_id', Auth::user()->id)->get();
        return view('pages.checkout', [
            'carts' => $carts
        ]);
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $user->update($request->except('total_price', 'transaction_id'));

        $total = Transaction::find($request->transaction_id);
        $total->update(['total_price' => $request->total_price]);

        return redirect()->route('dashboard-transaction');
    }

    public function delete($id)
    {
        $cart = TransactionDetail::findOrFail($id);

        $cart->delete();

        return redirect()->route('checkout');
    }
    public function deleteall()
    {
        $carts = TransactionDetail::with(['ticket.event.user', 'transaction'])->whereHas('transaction', function ($transaction) {
            $transaction->where('user_id', Auth::user()->id)->where('transaction_status', 'PENDING');
        });
        
        $transaction = Transaction::with(['user'])->where('user_id', Auth::user()->id)->where('transaction_status', 'PENDING');

        $carts->delete();
        $transaction->delete();

        return redirect()->route('home');
    }
}
