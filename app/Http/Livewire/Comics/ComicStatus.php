<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ComicStatus extends Component
{
    use AuthorizesRequests;
    public $comic, $chapter, $current;

    public function mount(Comic $comic)
    {
        $this->comic = $comic;

        foreach ($comic->chapters as $chapter) {
            if (!$chapter->completed) {
                $this->current = $chapter;
                break;
            }
        }
        
        if (!$this->current) {
            $this->current = $comic->chapters->last();
        }

        $this->authorize('enrolled', $comic);

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
