<?php

namespace App\Http\Controllers;

use App\User;
use App\VerificationData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardProfileController extends Controller
{

    public function myprofile()
    {
        $item = Auth::user();

        return view('pages.dashboard-profile', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();

        $item = Auth::user();



        $item->update($data);

        return redirect()->route('dashboard-profile');
    }

    public function verification()
    {
        return view('pages.dashboard-verification');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_card_photo'] = $request->file('id_card_photo')->store('assets/verification', 'public');
        $verif_id = VerificationData::create($data);

        $verif = User::find(Auth::user()->id);
        $verif->update(['verification_id' => $verif_id->id]);

        return redirect()->route('dashboard-event');
    }
}
