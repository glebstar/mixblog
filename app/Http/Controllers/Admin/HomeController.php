<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Menu;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->method() == 'POST') {
            Setting::where('id', 1)
                ->update([
                    'title' => $request->title,
                    'img'   => $request->img,
                    'head'  => $request->head,
                    'body'  => $request->body
                ]);
        }

        return view('admin.index');
    }

    public function menu()
    {
        return view('admin.menu');
    }

    public function menuAdd()
    {
        Menu::create([
            'path' => 'some',
            'title' => 'Измени меня',
            'sort' => 100
        ]);

        return redirect()->route('admin.menu');
    }

    public function menuDel(Request $request) {
        Menu::where('id', $request->id)->delete();
        return redirect()->route('admin.menu');
    }

    public function menuSave(Request $request)
    {
        Menu::where('id', $request->id)->update(
            [
                'path' => $request->path,
                'title' => $request->title,
                'sort' => $request->sort
            ]
        );

        return response()->json([
            'result' => 'ok',
            'id' => $request->id
        ]);
    }
}
