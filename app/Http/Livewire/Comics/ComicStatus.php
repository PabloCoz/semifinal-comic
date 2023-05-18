<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use App\Models\Comic;
use Livewire\Component;

class ComicStatus extends Component
{
    public $comic, $chapter;

    public function mount(Comic $comic, Chapter $chapter)
    {
        $this->comic = $comic;
        $this->chapter = $chapter;
    }

    public function render()
    {
        return view('livewire.comics.comic-status');
    }
}
