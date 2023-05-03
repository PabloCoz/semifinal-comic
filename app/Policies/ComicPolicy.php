<?php

namespace App\Policies;

use App\Models\Comic;
use App\Models\User;

class ComicPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }

    public function created(User $user, Comic $comic)
    {
        if ($comic->user_id == $user->id)
            return true;
        else
            return false;
    }
}
