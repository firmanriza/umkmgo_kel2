<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::with('user')->latest()->get();
        return view('forum.index', compact('forums'));
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Forum::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('forum.index')->with('success', 'Diskusi berhasil dibuat');
    }

    public function show(Forum $forum)
    {
        $forum->load(['comments.user']); // untuk komentar
        return view('forum.show', compact('forum'));
    }

    public function edit(Forum $forum)
{
    $this->authorize('update', $forum);
    return view('forum.edit', compact('forum'));
}

public function update(Request $request, Forum $forum)
{
    $this->authorize('update', $forum);

    $request->validate([
        'title' => 'required',
        'content' => 'required',
    ]);

    $forum->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('forum.index')->with('success', 'Diskusi berhasil diperbarui');
}

public function destroy(Forum $forum)
{
    $this->authorize('delete', $forum);
    $forum->delete();

    return redirect()->route('forum.index')->with('success', 'Diskusi berhasil dihapus');
}
}