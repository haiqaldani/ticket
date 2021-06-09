<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $items = Transaction::with('user')->get();

        return view('pages.admin.transaction.index',[
            'items' => $items
        ]);
    }
}
