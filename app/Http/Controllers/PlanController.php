<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Slider;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __invoke()
    {
        $plans = Plan::all();
        $sliders = $this->sliders();
        return view('plans.index', compact('plans', 'sliders'));
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
