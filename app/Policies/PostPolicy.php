<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    
    public function likes(User $user, Post $post)
    {
        foreach ($post->likes as $like) {
            if ($like->user_id == $user->id) {
                return true;
            }
        }
    }
}
