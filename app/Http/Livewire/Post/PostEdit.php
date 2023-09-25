<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;
    public $post;
    public $open = false;

    public $description, $img, $ident, $images;

    protected $rules = [
        'post.description' => 'required',
    ];

    protected $listeners = ['render'];

    public function mount(Post $post)
    {
        $this->post = $post;
        
        $this->ident = rand();
    }
    public function render()
    {
        $this->images = $this->post->images;
        return view('livewire.post.post-edit');
    }

    public function save()
    {
        $this->validate();
        $this->post->save();
        if($this->img){
            foreach($this->images as $image){
                Storage::delete($image->url);
                $image->delete();
            }

            foreach ($this->img as $imae) {
                $this->post->images()->create([
                    'url' => $imae->store('posts', 'public')
                ]);
            }
        }
        $this->reset(['open', 'description', 'img', 'ident']);
        $this->ident = rand();
        $this->emitSelf('render');
        $this->emitTo('post.post-list', 'render');
    }
}
