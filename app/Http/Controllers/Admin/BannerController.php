<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(){
        $items = Banner::with('event', 'blog')->get();
        return view('pages.admin.banner.index',[
            'items' => $items
        ]);
    }

    public function create(){
        return view('pages.admin.banner.create');
    }

    public function store(BannerRequest $request){
        $data = $request->all();
        Banner::create($data);

        return redirect()->route('banner.index');
    }

    public function view(){

    }

    public function edit(){
        $item = Banner::with('event', 'blog')->get();

        return view('pages.admin.banner.edit',[
            'item' => $item
        ]);
    }

    public function update(BannerRequest $request, $id){
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/banner', 'public'
        );

        $item = Banner::findOrFail($id);

        $item->update($data);
        return redirect()->route('banner.index');
    }

    public function destroy($id){
        $item = Banner::findorFail($id);
        $item->delete();

        return redirect()->route('banner.index');

    }
}
