<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact', [
            'messages' => Contact::orderBy('create_time', 'desc')->paginate(10)
        ]);
    }
}
