<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->id) {
            echo 'blog';
            exit;
        }

        return view('blog', [
            'articles' => Article::orderBy('create_time', 'desc')
                ->paginate(5)
        ]);
    }
}
