<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'forum_id' => 'required|exists:forums,id',
            'content' => 'required'
        ]);

        Comment::create([
            'forum_id' => $request->forum_id,
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}

