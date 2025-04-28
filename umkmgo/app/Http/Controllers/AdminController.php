<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    // Show list of users for admin to manage roles
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Update user role (e.g., assign Mentor role)
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,mentor,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
