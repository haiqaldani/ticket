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

    public function edit($id)
    {
        $item = Transaction::findorFail($id);
        return view('pages.admin.transaction.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $item = Transaction::findOrFail($id);

        $item->update($data);
        return redirect()->route('transaction.index');
    }

    public function destroy($id)
    {
        $item = Transaction::findorFail($id);
        $item->delete();

        return redirect()->route('transaction.index');
    }
}
