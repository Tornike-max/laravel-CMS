<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostComments extends Component
{
    public Post $post;

    #[Rule('required|min:10|max:200')]
    public $comment;

    public function postComment()
    {
        $this->validateOnly('comment');

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);

        $this->reset('comment');
    }

    #[Computed()]
    public function comments()
    {
        $comments = $this?->post?->comments()->latest()->paginate(5);
        return $comments;
    }

    public function render()
    {

        return view('livewire.post-comments');
    }
}
