<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CreatorLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $comic)
    {
        $this->comic = $comic;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.creator');
    }
}
