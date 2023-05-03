<?php

namespace App\Http\Livewire\Creator;

use App\Models\Comic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ComicObservation extends Component
{
    use AuthorizesRequests;
    public $comic;

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
        $this->authorize('created', $comic);
    }

    public function render()
    {
        return view('livewire.creator.comic-observation')->layout('layouts.creator', ['comic' => $this->comic]);
    }

    public function getObservationsProperty()
    {
        return $this->comic->observations;
    }
}
