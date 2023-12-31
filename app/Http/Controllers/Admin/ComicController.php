<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Notifications\StatusComic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {

        return view('admin.comics.index');
    }

    public function show(Comic $comic)
    {
        return view('admin.comics.show', compact('comic'));
    }

    public function approved(Comic $comic)
    {
        $comic->observations()->delete();
        $comic->status = Comic::PUBLICADO;
        $data = [
            'url' => route('comics.show', $comic),
            'message' => 'El cómic <b> ' . $comic->title . '</b> ha sido aprobado y publicado'
        ];
        $comic->user->notify(new StatusComic($data));
        $comic->save();
        return redirect()->route('admin.comics.revision');
    }

    public function revision()
    {
        $comics = Comic::where('status', Comic::REVISIÓN)->paginate(10);
        return view('admin.comics.revision', compact('comics'));
    }
}
