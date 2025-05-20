<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{

    public function viewAny(User $user)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

  
    public function view(User $user, Article $article)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

 
    public function create(User $user)
    {
        // Only admin can create articles
        return $user->role === 'admin';
    }

    public function update(User $user, Article $article)
    {
        // Only admin can update articles
        return $user->role === 'admin';
    }


    public function delete(User $user, Article $article)
    {
        // Only admin can delete articles
        return $user->role === 'admin';
    }
}
