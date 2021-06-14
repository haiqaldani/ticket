<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
{
    public function store(Request $request)
    {
        if ($request->input('quantity') != 0) {
        }
        foreach ($request->input('quantity') as $i => $quantity) {
            $time = Carbon::now()->toDateTimeString();
            if ($quantity != 0) {
                $store_ticket = array(
                    'user_id' => $request->input('user_id'),
                    'ticket_id' => $request->ticket_id[$i],
                    'quantity' => $quantity,
                    'updated_at' =>  $time,
                    'created_at' =>  $time,
                );

                $total = Ticket::find($request->ticket_id[$i]);
                $total->update(['quantity' => $total->quantity - $quantity]);

                Cart::insert($store_ticket);
            }
        }
        return redirect()->back();
    }
}
