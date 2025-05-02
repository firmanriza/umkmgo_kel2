<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Forum;

class ForumPolicy
{
    public function update(User $user, Forum $forum)
    {
        return $user->id === $forum->user_id || $user->role === 'admin';
    }

    public function delete(User $user, Forum $forum)
    {
        return $user->id === $forum->user_id || $user->role === 'admin';
    }
}