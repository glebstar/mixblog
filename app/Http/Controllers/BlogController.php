<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        return view('blog', [
            'articles' => Article::orderBy('create_time', 'desc')
                ->paginate(5)
        ]);
    }

    public function article($slug, $id)
    {
        $article = Article::findOrFail($id);

        return view('article', [
            'article' => $article
        ]);
    }
}
