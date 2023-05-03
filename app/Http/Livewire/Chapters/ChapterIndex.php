<?php

namespace App\Http\Livewire\Chapters;

use App\Models\Comic;
use Livewire\Component;

class ChapterIndex extends Component
{
    public $comic, $chapters;

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
        $this->chapters = $comic->chapters()->orderBy('position', 'asc')->get();
    }
    public function render()
    {
        return view('livewire.chapters.chapter-index');
    }
}
