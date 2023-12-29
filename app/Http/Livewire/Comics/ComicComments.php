<?php

namespace App\Http\Livewire\Comics;

use App\Models\Chapter;
use App\Models\Comment;
use Livewire\Component;

class ComicComments extends Component
{
    public $chapter;

    public $comment, $respuesta;
    public $liked = 1;

    protected $listeners = ['render'];
    public function render()
    {
        $this->chapter = Chapter::find($this->chapter->id);
        return view('livewire.comics.comic-comments');
    }

    public function save()
    {
        $this->validate([
            'comment' => 'required|min:3'
        ]);

        $this->chapter->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $this->comment
        ]);

        $this->comment = '';
        $this->emit('render');
    }

    public function likeComment($commentId)
    {
        $comment = Comment::find($commentId);
        if ($comment->likes()->where('user_id', auth()->user()->id)->exists()) {
            return;
        }
        $comment->likes()->create([
            'value' => $this->liked, // 'value' => '1
            'user_id' => auth()->user()->id
        ]);
        $this->emit('render');
    }

    public function unlikeComment($commentId)
    {
        $comment = Comment::find($commentId);
        if (!$comment->likes()->where('user_id', auth()->user()->id)->exists()) {
            return;
        }
        $comment->likes()->where('user_id', auth()->user()->id)->delete();
        $this->emit('render');
    }


    public function reply($commentId)
    {
        $this->validate([
            'respuesta' => 'required|min:3'
        ]);

        $this->chapter->comments()->create([
            'user_id' => auth()->user()->id,
            'content' => $this->respuesta,
            'parent_id' => $commentId
        ]);

        $this->respuesta = '';
        $this->emit('render');
    }

    public function getCommentsProperty()
    {
        return $this->chapter->comments()
            ->whereNull('parent_id')
            ->with('replies')
            ->latest()
            ->get();
    }
}
