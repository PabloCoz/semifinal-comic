<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use Livewire\Component;

class ComicComments extends Component
{
    public $chapter;

    public $comment;

    protected $listeners = ['render'];
    public function render()
    {
        $this->chapter = Chapter::find($this->chapter->id);
        return view('livewire.comics.comic-comments');
    }

    public function save()
    {
        $this->validate([
            'comment' => 'required|min:3'
        ]);

        $this->chapter->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $this->comment
        ]);

        $this->comment = '';
        $this->emit('render');
    }
}
