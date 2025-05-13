<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Umkm;
use App\Models\KategoriUmkm;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $umkm = $user->umkm;
        $kategori_umkms = KategoriUmkm::all();

        return view('profile', compact('user', 'umkm', 'kategori_umkms'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'nama_umkm' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'kategori_umkm_id' => 'nullable|exists:kategori_umkms,id',
        ]);

        $umkm = $user->umkm;

        if ($umkm) {
            $umkm->update($validatedData);
        } else {
            $umkm = new Umkm($validatedData);
            $umkm->user_id = $user->id;
            $umkm->save();
        }

        return redirect()->route('profile.edit')->with('success', 'UMKM profile updated successfully.');
    }
}
