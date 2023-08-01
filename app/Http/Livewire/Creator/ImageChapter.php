<?php

namespace App\Http\Livewire\Creator;

use App\Models\Chapter;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageChapter extends Component
{
    use WithFileUploads;

    public $chapter, $ident, $img = [], $image, $ide;

    public function mount(Chapter $chapter)
    {
        $this->chapter = $chapter;
        $this->ident = rand();
        $this->ide = rand();
    }

    public function render()
    {
        return view('livewire.creator.image-chapter');
    }

    public function getImagesProperty()
    {
        return $this->chapter->images()->orderBy('position', 'ASC')->get();
    }

    public function addImages()
    {
        $this->validate([
            'img.*' => 'image|max:12288',
        ]);

        if ($this->img) {
            $this->img[] = '';
        }
    }

    public function removeImage($index)
    {
        unset($this->img[$index]);
        $this->img = array_values($this->img);
    }

    public function store()
    {
        $this->validate([
            'image' => 'image|max:12288',
        ]);

        if ($this->chapter->image) {
            Storage::delete($this->chapter->image);
            $url = Storage::put('chapters', $this->image);
            $this->chapter->update([
                'image' => $url,
            ]);
        } else {
            $url = Storage::put('chapters', $this->image);
            $this->chapter->update([
                'image' => $url,
            ]);
        }
        $this->reset('image');
    }

    public function createImages()
    {
        $this->validate([
            'img.*' => 'image|max:12288',
        ]);

        foreach ($this->img as $value) {
            $url = $value->store('chapters');
            $this->chapter->images()->create([
                'imageable_id' => $this->chapter->id,
                'position' => $this->chapter->images()->count() + 1,
                'url' => $url,
            ]);
        }
        $this->reset('img');
        $this->chapter = Chapter::find($this->chapter->id);
    }

    public function deleteImage($image)
    {
        $id = Image::find($image);

        Storage::delete($id->url);
        $id->delete();
        foreach ($this->chapter->images as $key => $value) {
            if ($value['position'] > $id['position']) {
                $value->update(['position' => $value['position'] - 1]);
            }
        }
        $this->chapter = Chapter::find($this->chapter->id);
    }

    public function back()
    {
        return redirect()->route('creator.comics.chapter', $this->chapter->comic);
    }
}
