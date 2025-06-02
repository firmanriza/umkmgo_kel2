<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Tampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Update role user
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:user,mentor,admin',
        ]);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Role pengguna berhasil diperbarui.');
    }


   public function assignCertificateForm()
{
    $users = User::whereHas('certificates')->with('certificates')->get();
    return view('certificate.users_with_certificates', compact('users'));
}

}
