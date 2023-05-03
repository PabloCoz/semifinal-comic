<?php

namespace App\Http\Livewire\Creator;

use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;

class ComicsIndex extends Component
{
    use WithPagination;
    
    public function render()
    {
        $comics = Comic::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.creator.comics-index', compact('comics'));
    }
}
