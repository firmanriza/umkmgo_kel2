<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles, with optional search.
     */
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

    // Other resource methods (create, store, show, edit, update) can be added here as needed
}
