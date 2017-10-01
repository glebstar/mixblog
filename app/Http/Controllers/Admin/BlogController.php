<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'articles' => Article::orderBy('create_time', 'desc')
                ->paginate(5)
        ]);
    }

    public function add(Request $request)
    {
        if($request->method() == 'POST') {
            Article::create([
                'title' => $request->title,
                'img' => $request->img,
                'body' => $request->body,
                'slug' => str_slug($request->title, '-'),
                'create_time' => time(),
            ]);

            return redirect()->route('admin.blog');
        }

        return view('admin.blog.add');
    }

    public function edit(Request $request)
    {
        $article = Article::findOrFail($request->id);

        if($request->method() == 'POST') {
            $article->title = $request->title;
            $article->img = $request->img;
            $article->body = $request->body;
            $article->slug = str_slug($request->title, '-');
            $article->save();

            return redirect('/blog/' . $article->slug . '/' . $article->id);
        }

        return view('admin.blog.edit', [
            'article' => $article
        ]);
    }

    public function del(Request $request) {
        Article::where('id', $request->id)->delete();
        return redirect()->route('admin.blog');
    }
}
