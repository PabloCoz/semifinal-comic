<?php

namespace App\Http\Livewire\Post;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PostList extends Component
{
    use AuthorizesRequests;
    public $user;

    public $posts;

    protected $listeners = ['render'];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        //dd($this->user);
        if ($this->user->user_enrolled()->where('subs_user_id', auth()->id())->exists()) {
            $this->posts = $this->user->posts;
        } else {
            $this->posts = $this->user->posts->take(2);
        }
        return view('livewire.post.post-list');
    }

    public function deletePost($postId)
    {
        $post = $this->user->posts()->find($postId);
        foreach ($post->images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }
        $post->images()->delete();
        $post->delete();
        $this->posts = $this->user->posts;
        $this->emitSelf('render');
    }

    public function like($post)
    {
        $likePost = Post::find($post);
        $likePost->likes()->create([
            'value' => 1,
            'user_id' => auth()->id(),
        ]);
        $this->emitSelf('render');
    }

    public function dislike($post)
    {
        Like::where('likeable_id', $post)->where('user_id', auth()->id())->delete();
        $this->emitSelf('render');
    }
}
