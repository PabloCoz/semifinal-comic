<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\Slider;
use Livewire\Component;

class SearchUsers extends Component
{
    public $search;

    public function render()
    {
        $sliders = $this->sliders();
        return view('livewire.user.search-users', compact('sliders'));
    }

    public function getUsersProperty()
    {
        return Profile::where('is_original', Profile::ORIGINAL)->get() ?? [];
    }

    public function getResultsProperty()
    {
        return Profile::where('is_original', Profile::ORIGINAL)
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('lastname', 'like', '%' . $this->search . '%')
            ->get() ?? [];
    }

    public function sliders()
    {
        $sliders = Slider::where('route', request()->path())->get();
        return $sliders;
    }
}
