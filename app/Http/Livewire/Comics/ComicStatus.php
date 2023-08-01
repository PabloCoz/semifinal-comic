<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ComicStatus extends Component
{
    use AuthorizesRequests;
    use WithPagination;
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

        //$this->comic->chapters->pluck('id')->search($this->chapter->id);
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
        return $this->comic->chapters->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {
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

    public function completed()
    {
        if ($this->current->completed) {
            $this->current->users()->detach(auth()->user()->id);
            $this->current->completed = false;
            $this->current->save();
        } else {
            $this->current->users()->attach(auth()->user()->id);
            $this->current->completed = true;
            $this->current->save();
        }

        $this->current = Chapter::find($this->current->id);
        $this->comic = Comic::find($this->comic->id);
    }

    public function getAdvanceProperty()
    {
        $i = 0;
        foreach ($this->comic->chapters as $chapter) {
            if ($chapter->completed) {
                $i++;
            }
        }

        $advance = ($i * 100) / $this->comic->chapters->count();
        return round($advance, 2);
    }
}
