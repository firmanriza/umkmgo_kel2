<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Cek apakah pengguna memiliki hak akses sebagai admin
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function view(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Cek apakah pengguna memiliki hak untuk memperbarui peran pengguna lain
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function updateRole(User $user)
    {
        return $user->role === 'admin';
    }
}

