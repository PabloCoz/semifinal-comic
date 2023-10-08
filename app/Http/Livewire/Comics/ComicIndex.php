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
            ->when($this->cate, function ($query) {
                $query->where('category_id', $this->cate);
            })
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 3);
                $query->orWhere('is_original', 2);
            })
            ->latest('id')->paginate(10);
    }

    public function originals()
    {
        return Comic::where('status', Comic::PUBLICADO)
            ->where('title', 'LIKE', '%' . $this->search . '%')
            ->when($this->cate, function ($query) {
                $query->where('category_id', $this->cate);
            })
            ->whereHas('profile', function ($query) {
                $query->where('is_original', 1);
            })
            ->latest('id')->paginate(10);
    }

    public function clearPage()
    {
        $this->reset('search');
    }

    public function resetFilters()
    {
        $this->reset('cate');
        $this->reset('search');
    }
}
