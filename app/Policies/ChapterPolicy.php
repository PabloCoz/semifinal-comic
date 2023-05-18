<?php

namespace App\Policies;

use App\Models\Chapter;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChapterPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function liked(User $user, Chapter $chapter)
    {
        foreach ($chapter->likes as $like) {
            if ($like->user_id == auth()->user()->id) {
                return true;
            }
        }
    }
}
