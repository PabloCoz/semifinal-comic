<?php

namespace App\Http\Livewire\Comics;

use App\Models\Comic;
use Livewire\Component;

class ComicRating extends Component
{
    public $comic, $rating = 0;

    protected $listeners = ['render'];

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
    }
    
    public function render()
    {
        $value = round($this->comic->ratings->avg('value'), 2);
        return view('livewire.comics.comic-rating', compact('value'));
    }

    public function store()
    {
        $this->validate([
            'rating' => 'required|numeric|min:1|max:5'
        ]);

        $this->comic->ratings()->create([
            'user_id' => auth()->id(),
            'value' => $this->rating
        ]);
        $this->reset('rating');
        $this->emitSelf('render');
    }
}
