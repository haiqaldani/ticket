<?php

namespace App\Http\Controllers;

use App\Account;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardAccountController extends Controller
{
    public function index()
    {
        $item = Account::where('user_id', Auth::user()->id)->first();
        $account = Account::where('user_id', Auth::user()->id)->count();
        return view('pages.dashboard-account',[
            'item' => $item,
            'account' => $account
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Account::create($data);

        return redirect()->route('dashboard-account');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Transaction::findOrFail($id);

        $data['transaction_status'] = 'PROCESS';

        $item->update($data);

        return redirect()->route('dashboard-mytransaction');
    }
}
