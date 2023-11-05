<?php

namespace App\Http\Livewire\Creator;

use App\Models\Chapter;
use App\Models\Comic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Str;


class ComicChapter extends Component
{
    use AuthorizesRequests;

    public $comic, $chapter, $name, $ident;

    public $img;

    protected $rules = [
        'chapter.name' => 'required',
    ];

    protected $listeners = ['delete' => 'delete'];

    public function mount(Comic $comic)
    {
        $this->comic = $comic;
        $this->chapter = new Chapter();
        $this->ident = rand();
        $this->authorize('created', $comic);
    }

    public function render()
    {
        return view('livewire.creator.comic-chapter')->layout('layouts.creator', ['comic' => $this->comic]);
    }

    public function getChaptersProperty()
    {
        return $this->comic->chapters()->orderBy('position', 'ASC')->get();
    }

    public function edit($chapter)
    {
        $this->chapter = $chapter;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Chapter::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'position' => $this->comic->chapters()->count() + 1,
            'comic_id' => $this->comic['id'],
        ]);

        $this->reset('name');
        $this->comic = Comic::find($this->comic['id']);
    }

    public function update()
    {
        $this->validate();

        Chapter::updateOrCreate(['id' => $this->chapter['id']], [
            'name' => $this->chapter['name'],
            'slug' => Str::slug($this->chapter['name']),
            'comic_id' => $this->comic['id'],
        ]);

        $this->chapter = new Chapter();
        $this->comic = Comic::find($this->comic['id']);
    }

    public function delete($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        $chapters = $this->comic->chapters()->orderBy('position', 'ASC')->get();
        $position = 1;
        foreach ($chapters as $chapter) {
            $chapter->update(['position' => $position]);
            $position++;
        }
        $this->comic = Comic::find($this->comic['id']);
    }
}
