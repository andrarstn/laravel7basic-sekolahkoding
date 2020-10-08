<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(6);
        return view('article.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('article.create');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();
        if($article==null)
            abort(404);
        return view('article.show', ['article' => $article]);
        // return view('show', compact('slug')); == sama saja
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail' => 'mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'subject' => 'required'
        ]);

        $imgName = $request->thumbnail->getClientOriginalName().'-'.time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('images'),$imgName);

        // $article = new Article();
        // $article->title = $request->title;
        // $article->subject = $request->subject;
        // $article->save();

        Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'subject' => $request->subject,
            'thumbnail' => $imgName
        ]);

        return redirect('/article');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('article.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required'
        ]);
        
        $imgName=null;
        if ($request->thumbnail) {
            $imgName = $request->thumbnail->getClientOriginalName().'-'.time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'),$imgName);
        }

        Article::find($id)->update([
            'title' => $request->title,
            'subject' => $request->subject,
            'thumbnail' => $request->thumbnail
        ]);
        // $article = Article::find($id);
        // $article->title = $request->title;
        // $article->subject = $request->subject;
        // $article->save();
        return redirect('/article');
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/article');
    }
}
