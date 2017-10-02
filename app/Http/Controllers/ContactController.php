<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->method() == 'POST') {
            Contact::create([
                'name' => $request->name,
                'body' => $request->body,
                'create_time' => time()
            ]);

            return redirect()->route('blog');
        }

        return view('contact', [
            'article' => json_decode(json_encode(['title' => 'Написать мне']))
        ]);
    }
}
