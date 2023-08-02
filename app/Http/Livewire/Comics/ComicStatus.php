<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ComicStatus extends Component
{
    use AuthorizesRequests;
    public $comic, $chapters, $current;

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
        $this->chapters = $comic->chapters->sortBy('position');
        foreach ($comic->chapters as $chapter) {
            if (!$chapter->completed) {
                $this->current = $comic->chapters->sortBy('position')->first();
            }
        }

        if (!$this->current) {
            $this->current = $this->comic->chapters->last();
        }

        $this->authorize('enrolled', $comic);
    }

    public function render()
    {
        return view('livewire.comics.comic-status');
    }

    public function changeChapter($chapter)
    {
        $this->current = Chapter::find($chapter);
    }

    public function getIndexProperty()
    {
        return $this->chapters->pluck('position')->search($this->current->position);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {
            return $this->chapters[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if ($this->index == $this->comic->chapters->count() - 1) {
            return null;
        } else {
            $this->completed();
            return $this->chapters[$this->index + 1];
        }
    }

    public function completed()
    {
        if (!$this->current->completed) {
            $this->current->users()->attach(auth()->user()->id);
        }
    }
}
