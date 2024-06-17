<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{

    use WithPagination;

    #[Url()]
    public $sort = 'desc';
    public $search = '';

    public function setSort($sort)
    {
        $this->sort = $sort === 'asc' ? 'asc' : 'desc';
    }

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
    }

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('published_at', $this->sort)
            ->paginate(3);
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}