<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Slider;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('route', request()->path())->get();
        $questions =  Question::where('is_public', true)->paginate(8);
        return view('questions.index', compact('sliders', 'questions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'title' => 'required',
        ]);

        Question::create($data);

        return redirect()->route('faq.index')->with('success', 'Pregunta enviada correctamente');
    }
}
