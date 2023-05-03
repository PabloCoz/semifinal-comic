<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComicController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Comic (creador)')->only('index');
        $this->middleware('can:Crear Comic (creador)')->only('create', 'store');
        $this->middleware('can:Editar Comic (creador)')->only('edit', 'update', 'status');
        $this->middleware('can:Eliminar Comic (creador)')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('creator.comics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('creator.comics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'profile_id' => 'required',
            'img' => 'image',
            'file' => 'image',
        ]);
        $comic =  Comic::create($request->all());
        if ($request->file('file')) {
            $url = Storage::put('comics', $request->file('file'));
            $comic->image()->create([
                'url' => $url
            ]);
        }

        if ($request->file('img')) {
            $url = Storage::put('comic_portada', $request->file('img'));
            $comic->update([
                'img' => $url
            ]);
        }

        return redirect()->route('creator.comics.index')->with('success', 'Comic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        $this->authorize('created', $comic);
        $categories = Category::pluck('name', 'id');
        return view('creator.comics.edit', compact('comic', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $this->authorize('created', $comic);
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'profile_id' => 'required',
            'file' => 'image',
            'img' => 'image',
        ]);

        $comic->update($request->all());

        if ($request->file('file')) {

            if ($comic->image) {
                Storage::delete($comic->image->url);
                $url = Storage::put('comics', $request->file('file'));
                $comic->image->update([
                    'url' => $url,
                ]);
            } else {
                $url = Storage::put('comics', $request->file('file'));
                $comic->image()->create([
                    'url' => $url,
                ]);
            }
        }

        if ($request->file('img')) {

            if ($comic->img) {
                Storage::delete($comic->img);
                $url = Storage::put('comic_portada', $request->file('img'));
                $comic->update([
                    'img' => $url,
                ]);
            } else {
                $url = Storage::put('comic_portada', $request->file('img'));
                $comic->update([
                    'img' => $url,
                ]);
            }
        }
        return redirect()->route('creator.comics.index')->with('success', 'Comic updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $this->authorize('created', $comic);
        $comic->delete();
        return redirect()->route('creator.comics.index')->with('success', 'Comic deleted successfully');
    }

    public function status(Comic $comic)
    {
        $this->authorize('created', $comic);
        $comic->status = 2;
        $comic->save();
        return redirect()->route('creator.comics.index')->with('success', 'Comic status updated successfully');
    }
}
