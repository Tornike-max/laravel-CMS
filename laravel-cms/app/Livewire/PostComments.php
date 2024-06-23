<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;
    public Post $post;

    #[Rule('required|min:10|max:200')]
    public $comment;

    public function postComment()
    {
        if (auth()->guest()) {
            return redirect('login');
        }

        $this->validateOnly('comment');

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);

        $this->reset('comment');
    }

    public function deleteComment(Comment $comment)
    {
        if (auth()->guest()) {
            return;
        }
        $user = auth()->user();

        return $user->deleteComment($comment);
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
