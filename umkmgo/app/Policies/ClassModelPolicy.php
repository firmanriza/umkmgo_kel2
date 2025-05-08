<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ClassModel;

class ClassModelPolicy
{

    public function viewAny(User $user)
    {
        return in_array($user->role, ['user', 'admin']);
    }


    public function view(User $user, ClassModel $class)
    {
        return in_array($user->role, ['user', 'admin']);
    }


    public function create(User $user)
    {
        return $user->role === 'admin';
    }


    public function update(User $user, ClassModel $class)
    {
        return in_array($user->role, ['admin', 'mentor']);
    }


    public function delete(User $user, ClassModel $class)
    {
        return $user->role === 'admin';
    }

    public function join(User $user, ClassModel $class)
    {
        return $user->role === 'user';
    }
}
