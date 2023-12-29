<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function likeComment(User $user, Comment $comment)
    {
        foreach ($comment->likes as $like) {
            if ($like->user_id == $user->id) {
                return true;
            }
        }
    }
}
