<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $sliders = Slider::where('route', request()->path())->get();
        $comics = $this->showComic();
        return view('welcome', compact('sliders', 'comics'));
    }

    public function showComic()
    {
        return Comic::where('status', Comic::PUBLICADO)
            ->where('is_public', 1)
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 1);
            })
            ->latest('id')->take(4)->get();
    }
}
