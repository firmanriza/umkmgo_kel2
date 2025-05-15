<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ClassModel;

class ClassModelPolicy
{
<<<<<<< Updated upstream

=======
    /**
     * Determine whether the user can view any classes.
     */
>>>>>>> Stashed changes
    public function viewAny(User $user)
    {
        return in_array($user->role, ['user', 'admin']);
    }

<<<<<<< Updated upstream

=======
    /**
     * Determine whether the user can view the class.
     */
>>>>>>> Stashed changes
    public function view(User $user, ClassModel $class)
    {
        return in_array($user->role, ['user', 'admin']);
    }

<<<<<<< Updated upstream

=======
    /**
     * Determine whether the user can create classes.
     */
>>>>>>> Stashed changes
    public function create(User $user)
    {
        return $user->role === 'admin';
    }

<<<<<<< Updated upstream

    public function update(User $user, ClassModel $class)
    {
        return in_array($user->role, ['admin', 'mentor']);
    }


=======
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
>>>>>>> Stashed changes
    public function delete(User $user, ClassModel $class)
    {
        return $user->role === 'admin';
    }

<<<<<<< Updated upstream
=======
    /**
     * Determine whether the user can join or participate in the class.
     */
>>>>>>> Stashed changes
    public function join(User $user, ClassModel $class)
    {
        return $user->role === 'user';
    }
}
