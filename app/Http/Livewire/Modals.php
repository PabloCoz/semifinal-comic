<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modals extends Component
{
    public $open = false;

    protected $listeners = ['openModal'];

    public function render()
    {
        return view('livewire.modals');
    }

    public function openModal()
    {
        $this->open = true;
    }
}
