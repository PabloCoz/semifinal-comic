<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use Livewire\Component;

class ChapterLike extends Component
{
    public $chapter, $comic;

    public $liked = 1;

    protected $listeners = ['render'];

    public function mount(Chapter $chapter)
    {
        $this->chapter = $chapter;
        $this->comic = $chapter->comic;
    }
    public function render()
    {
        return view('livewire.comics.chapter-like');
    }

    public function like()
    {
        $this->chapter->likes()->create([
            'value' => $this->liked,
            'user_id' => auth()->user()->id
        ]);
        $this->emitSelf('render');
    }

    public function unlike()
    {
        $this->chapter->likes()->where('user_id', auth()->user()->id)->delete();
        $this->emitSelf('render');
    }
}
