<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProfileController extends Controller
{
    
    public function myprofile()
    {
        $item = Auth::user();

        return view('pages.dashboard-profile',[
            'item' => $item
        ]);
    }

    public function update(Request $request, $redirect){
        $data = $request->all();

        $item = Auth::user();

        

        $item->update($data);

        return redirect()->route('dashboard-profile');
    }
}
