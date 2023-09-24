<?php

namespace App\Http\Livewire\Admin\Comic;

use App\Models\Comic;
use App\Models\Observation;
use Livewire\Component;

class ComicObservations extends Component
{
    public $open =  false;
    public $comic;
    public $observation;
    protected $listeners = ['render'];

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
    }
    public function render()
    {
        return view('livewire.admin.comic.comic-observations');
    }

    public function reject()
    {
        $this->validate([
            'observation' => 'required'
        ]);
        Observation::create([
            'comic_id' => $this->comic->id,
            'observations' => $this->observation
        ]);
        $this->comic->status = 1;
        $this->comic->save();
        $this->reset('observation', 'open');
        return redirect()->route('admin.comics.index');
    }
}
