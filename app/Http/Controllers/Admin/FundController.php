<?php

namespace App\Http\Controllers\Admin;

use App\Fund;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FundController extends Controller
{
    public function index(){
        $items = Fund::with(['event.user'])->get();

        return view('pages.admin.fund.index',[
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = Fund::findorFail($id);
        return view('pages.admin.fund.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $item = Fund::findOrFail($id);

        $item->update($data);
        return redirect()->route('fund.index');
    }

    public function destroy($id)
    {
        $item = Fund::findorFail($id);
        $item->delete();

        return redirect()->route('fund.index');
    }
}
