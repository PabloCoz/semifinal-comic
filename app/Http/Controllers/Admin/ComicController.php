<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = Comic::where('status', Comic::REVISIÓN)->paginate(10);
        return view('admin.comics.index', compact('comics'));
    }

    public function show(Comic $comic)
    {
        return view('admin.comics.show', compact('comic'));
    }

    public function approved(Comic $comic)
    {
        $comic->observations()->delete();
        $comic->status = Comic::PUBLICADO;
        $comic->save();
        return redirect()->route('admin.comics.index');
    }
}
