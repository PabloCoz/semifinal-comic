<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function premiun(User $to, User $creator)
    {
        if ($creator->user_enrolled()->where('subs_user_id', $to->id)->exists()) {
            return true;
        } else {
            return false;
        }
    }
}
