<div id="posts" class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div>
        @if(strlen($this->search) > 0)
            <span class='text-gray-700'>Searching {{ $this->search }}</span>
        @endif
        </div>

        <div id="filter-selector" class="flex items-center space-x-4 font-light ">
            <button class="{{ $this->sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500'}} py-4" wire:click='setSort("desc")'>Latest</button>
            <button class="{{ $this->sort === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500'}} py-4" wire:click='setSort("asc")'>Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
           <x-posts.post-item :post="$post"/>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
