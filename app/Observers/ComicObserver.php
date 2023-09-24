<?php

namespace App\Observers;

use App\Models\Comic;

class ComicObserver
{
    public function deleting(Comic $comic)
    {
        $comic->chapters()->delete();
        $comic->ratings()->delete();
        $comic->image()->delete();
        $comic->observations()->delete();
        $comic->users()->detach();
    }
}
