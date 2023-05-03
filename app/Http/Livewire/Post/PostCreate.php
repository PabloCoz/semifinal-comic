<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    public $open = false;

    public $description, $img, $ident;

    protected $rules = [
        'description' => 'required',
    ];

    public function render()
    {
        return view('livewire.post.post-create');
    }

    public function mount()
    {
        $this->ident = rand();
    }

    public function save()
    {
        $this->validate();

        $post = Post::create([
            'description' => $this->description,
            'user_id' => auth()->user()->id,
        ]);

        if ($this->img) {
            foreach ($this->img as $image) {
                $url = $image->store('posts');
                $post->images()->create([
                    'url' => $url
                ]);
            }
        }

        $this->reset(['open', 'description', 'img']);

        $this->ident = rand();

        $this->emitTo('post.post-list', 'render');
    }
}
