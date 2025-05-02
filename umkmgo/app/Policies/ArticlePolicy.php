<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any articles.
     */
    public function viewAny(User $user)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

    /**
     * Determine whether the user can view the article.
     */
    public function view(User $user, Article $article)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

    /**
     * Determine whether the user can create articles.
     */
    public function create(User $user)
    {
        // Only admin can create articles
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the article.
     */
    public function update(User $user, Article $article)
    {
        // Only admin can update articles
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the article.
     */
    public function delete(User $user, Article $article)
    {
        // Only admin can delete articles
        return $user->role === 'admin';
    }
}
