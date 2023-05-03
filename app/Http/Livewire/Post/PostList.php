<?php

namespace App\Http\Livewire\Post;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class PostList extends Component
{
    public $user;

    public $posts;

    protected $listeners = ['render'];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->posts = $user->posts;
    }

    public function render()
    {
        return view('livewire.post.post-list');
    }

    public function deletePost($postId)
    {
        $post = $this->user->posts()->find($postId);
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
