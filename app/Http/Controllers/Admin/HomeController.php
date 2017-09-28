<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

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
}
