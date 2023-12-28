<?php

namespace App\Http\Livewire\Admin\Comic;

use App\Models\Category;
use App\Models\Comic;
use Livewire\Component;
use Livewire\WithPagination;

class ComicSearch extends Component
{
    use WithPagination;

    public $search, $category_id, $status = 3;

    public function render()
    {
        $comics = Comic::where('status', $this->status)
            ->category($this->category_id)
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(12);

        return view('livewire.admin.comic.comic-search', compact('comics'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }

    public function resetFilters()
    {
        $this->reset(['search', 'category_id', 'status']);
    }

    public function getCategoriesProperty()
    {
        return Category::all();
    }

    public function visible($id){
        $comic = Comic::find($id);
        $comic->is_public = 1;
        $comic->save();
    }

    public function hidden($id){
        $comic = Comic::find($id);
        $comic->is_public = 0;
        $comic->save();
    }
}
