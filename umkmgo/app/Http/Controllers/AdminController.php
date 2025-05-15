<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\Certificate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
<<<<<<< Updated upstream
=======
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    // Show list of users for admin to manage roles
>>>>>>> Stashed changes
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

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
