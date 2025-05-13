<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Kirim data user, kelas, dsb jika perlu
        return view('user.dashboard');
    }
}
