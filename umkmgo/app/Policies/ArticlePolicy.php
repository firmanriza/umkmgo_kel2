<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
<<<<<<< Updated upstream

=======
    /**
     * Determine whether the user can view any articles.
     */
>>>>>>> Stashed changes
    public function viewAny(User $user)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

<<<<<<< Updated upstream
  
=======
    /**
     * Determine whether the user can view the article.
     */
>>>>>>> Stashed changes
    public function view(User $user, Article $article)
    {
        // All authenticated users can view articles
        return $user !== null;
    }

<<<<<<< Updated upstream
 
=======
    /**
     * Determine whether the user can create articles.
     */
>>>>>>> Stashed changes
    public function create(User $user)
    {
        // Only admin can create articles
        return $user->role === 'admin';
    }

<<<<<<< Updated upstream
=======
    /**
     * Determine whether the user can update the article.
     */
>>>>>>> Stashed changes
    public function update(User $user, Article $article)
    {
        // Only admin can update articles
        return $user->role === 'admin';
    }

<<<<<<< Updated upstream

=======
    /**
     * Determine whether the user can delete the article.
     */
>>>>>>> Stashed changes
    public function delete(User $user, Article $article)
    {
        // Only admin can delete articles
        return $user->role === 'admin';
    }
}
