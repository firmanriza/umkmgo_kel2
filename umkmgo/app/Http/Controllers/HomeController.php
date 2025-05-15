<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $certificates = $user->certificates()->with('class.kategori')->latest('issued_at')->get();
        $forums = $user->forums()->latest()->get();
        return view('home', compact('certificates', 'forums'));
    }
}
