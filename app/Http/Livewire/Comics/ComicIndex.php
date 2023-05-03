<?php

namespace App\Http\Livewire\Comics;

use App\Models\Category;
use App\Models\Comic;
use Livewire\Component;

class ComicIndex extends Component
{
    public $search;
    public $cate;

    public function render()
    {
        $comics = $this->notOriginals();
        $originals = $this->originals();
        return view('livewire.comics.comic-index', compact('comics', 'originals'));
    }

    public function getCategoriesProperty()
    {
        return Category::get();
    }

    public function notOriginals()
    {
        return Comic::where('status', Comic::PUBLICADO)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->where('category_id', 'LIKE', '%' . $this->cate . '%')
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 3);
            })
            ->latest('id')->paginate(10);
    }

    public function originals()
    {
        return Comic::where('status', Comic::PUBLICADO)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->where('category_id', 'LIKE', '%' . $this->cate . '%')
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 1);
            })
            ->latest('id')->paginate(10);
    }

    public function clearPage()
    {
        $this->reset('search');
    }
}
