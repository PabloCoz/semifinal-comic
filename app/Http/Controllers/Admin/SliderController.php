<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::paginate(6);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'page' => 'required',
            'route' => 'required'
        ]);

        $image = $request->file('image');
        $url = Storage::put('sliders', $image);
        Slider::create([
            'page' => $request->page,
            'url' => $url,
            'route' => $request->route,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'page' => 'required',
            'route' => 'required'
        ]);

        $image = $request->file('image');
        if ($image) {
            if ($slider->url) {
                Storage::delete($slider->url);
            }

            $url = Storage::put('sliders', $image);
            $slider->update([
                'page' => $request->page,
                'url' => $url,
                'route' => $request->route,
            ]);
        } else {
            $slider->update([
                'page' => $request->page,
                'route' => $request->route,
            ]);
        }

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}
