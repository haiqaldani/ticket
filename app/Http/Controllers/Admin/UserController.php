<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\VerificationData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $items = User::with('verification_data')->get();
        return view('pages.admin.user.index',[
            'items' => $items
        ]);
    }

    public function edit($id)
    {
        $item = User::with('verification_data')->findOrFail($id);
        return view('pages.admin.user.edit', [
            'item' => $item
        ])
    }

    
}
