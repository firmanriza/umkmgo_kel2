<?php

namespace App\Policies;

use App\Models\Forum;
use App\Models\User;

class ForumPolicy
{
    /**
     * Determine whether the user can update the forum.
     */
    public function update(User $user, Forum $forum)
    {
        return $user->id === $forum->user_id || $user->role === 'admin' || $user->role === 'mentor';
    }

    /**
     * Determine whether the user can delete the forum.
     */
    public function delete(User $user, Forum $forum)
    {
        return $user->id === $forum->user_id || $user->role === 'admin' || $user->role === 'mentor';
    }
}
