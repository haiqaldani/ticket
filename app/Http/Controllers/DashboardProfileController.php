<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProfileController extends Controller
{
    
    public function myprofile()
    {
        $item = Auth::user();

        return view('pages.dashboard-profile',[
            'item' => $item
        ]);
    }

    public function store(){
        
    }
}
