<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddTicketController extends Controller
{
    public function edit($id)
    {

        $item = Event::findOrFail($id);

        return view('pages.admin.event.addticket', [
            'ite' => $item, //diubahni//
        ]);
    }
}
