<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Slider;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $sliders = $this->sliders();
        return view('comics.index', compact('sliders'));
    }

    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    public function sliders()
    {
        $sliders = Slider::where('route', request()->path())->get();
        return $sliders;
    }

    public function enrolled(Comic $comic)
    {
        $comic->users()->attach(auth()->user()->id);
        return redirect()->route('comics.show', $comic);
    }
}
