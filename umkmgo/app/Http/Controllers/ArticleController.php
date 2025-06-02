<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('search');

        $articles = Article::query();

        if ($query) {
            $articles = $articles->where('title', 'like', '%' . $query . '%')
                                 ->orWhere('content', 'like', '%' . $query . '%');
        }

        $articles = $articles->latest()->paginate(10)->withQueryString();

        return view('articles.index', compact('articles', 'query'));
    }

  public function create() {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }

    public function store(Request $request) {
        $this->authorize('create', Article::class);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $request->file('image')?->store('articles', 'public');

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);
        $this->authorize('update', $article);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $imagePath = $article->image;
        if ($request->hasFile('image')) {
            if ($imagePath) Storage::disk('public')->delete($imagePath);
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath
        ]);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $this->authorize('delete', $article);

        if ($article->image) Storage::disk('public')->delete($article->image);
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }    

    public function show($id) {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}