<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class ComicUser extends Component
{
    public function render()
    {
        $comics = auth()->user()->comics_enrolled()->get();
        return view('livewire.user.comic-user', compact('comics'));
    }
}
