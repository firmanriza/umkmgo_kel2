<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Display all users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        // Validate the role
        $request->validate([
            'role' => 'required|in:user,mentor,admin',
        ]);

        // Update user role
        $user->role = $request->role;
        $user->save();

        // Redirect back to the users page with success message
        return redirect()->route('admin.users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }
}
