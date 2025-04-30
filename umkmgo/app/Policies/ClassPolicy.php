<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ClassModel;

class ClassPolicy
{
    /**
     * Determine whether the user can view any classes.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role, ['user', 'admin']);
    }

    /**
     * Determine whether the user can view the class.
     */
    public function view(User $user, ClassModel $class)
    {
        return in_array($user->role, ['user', 'admin']);
    }

    /**
     * Determine whether the user can create classes.
     */
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the class.
     */
    public function update(User $user, ClassModel $class)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the class.
     */
    public function delete(User $user, ClassModel $class)
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can join or participate in the class.
     */
    public function join(User $user, ClassModel $class)
    {
        return $user->role === 'user';
    }
}
