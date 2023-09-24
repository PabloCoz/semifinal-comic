<?php

namespace App\Policies;

use App\Models\Comic;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComicPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function created(User $user, Comic $comic)
    {
        if ($comic->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }

    public function enrolled(User $user, Comic $comic)
    {
        if ($user->can('Revisar Comic (administrador)')) {
            return true;
        } else {
            return $comic->users->contains($user->id);
        }
    }

    public function published(?User $user, Comic $comic)
    {
        if ($comic->status == 3) {
            return true;
        } else {
            return false;
        }
    }

    public function revision(User $user, Comic $comic)
    {
        if ($comic->status == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function valued(User $user, Comic $comic)
    {
        if (Rating::where('user_id', auth()->user()->id)->where('comic_id', $comic->id)->count())
            return false;
        else
            return true;
    }
}
