<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menambahkan middleware 'admin' pada constructor
    public function __construct()
    {
        $this->middleware('admin');
    }

    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Memperbarui peran pengguna
    public function updateRole(Request $request, User $user)
    {
        // Validasi input untuk memastikan hanya role yang valid
        $request->validate([
            'role' => 'required|in:user,mentor,admin',
        ]);

        // Perbarui role pengguna
        $user->role = $request->role;
        $user->save();

        // Redirect ke halaman admin.users.index dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
