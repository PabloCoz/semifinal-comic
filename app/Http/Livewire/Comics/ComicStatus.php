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

        //$this->comic->chapters->pluck('id')->search($this->chapter->id);
    }

    public function render()
    {
        return view('livewire.comics.comic-status');
    }

    public function changeChapter(Chapter $chapter)
    {
        $this->chapter = $chapter;
    }

    public function getIndexProperty()
    {
        $sa = $this->comic->chapters->pluck('id')->search($this->chapter->id);
        return $sa;
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {
            /* dd($this->comic->chapters[$this->index - 1]); */
            return $this->comic->chapters[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if ($this->index == $this->comic->chapters->count() - 1) {
            return null;
        } else {
            return $this->comic->chapters[$this->index + 1];
        }
    }
}
