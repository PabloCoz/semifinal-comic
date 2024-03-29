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

    public function premiun($userCreator, $toUser): bool
    {
        //return $toUser->user_enrolled()->where('subs_user_id', auth()->id())->exists();
        if ($userCreator->id == $toUser->id) {
            return true;
        } else {
            if($toUser->user_enrolled()->where('subs_user_id', auth()->id())->exists()){
                return true;
            } else {
                return false;
            }
        }
    }
}
