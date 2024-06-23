<div class="mt-10 comments-box border-t border-gray-100 pt-10">
    @if(Auth::user())
    <h2 class="text-2xl font-semibold text-gray-900 mb-5">Discussions</h2>
    <textarea wire:model='comment'
        class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
        cols="30" rows="7"></textarea>
    <button wire:click="postComment()"
        class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
        Post Comment
    </button>
    @endif

    @if(Auth::guest())
    <a wire:navigate href="{{route('login')}}" class="text-yellow-500 underline py-1" href=""> Login to Post
        Comments</a>
    @endif

    <div class="user-comments px-3 py-2 mt-5">
        @forelse ($this->comments as $comment)
        <div class="comment [&:not(:last-child)]:border-b border-gray-100 py-5">
            <div class="flex justify-between items-center">
                <div class="user-meta flex mb-4 text-sm items-center">
                    <img class="w-7 h-7 rounded-full mr-3" src="{{ $comment->user->profile_photo_url }}" alt="mn">
                    <span class="mr-1">{{ $comment->user->name }}</span>
                    <span class="text-gray-500">. {{ $comment->created_at->diffForHumans() }} </span>
                </div>
                <button wire:click="deleteComment({{ $comment }})"
                    class="text-red-500 hover:text-red-600 font-semibold">Delete
                    🗑️</button>
            </div>
            <div class="text-justify text-gray-700  text-sm">
                {{ $comment->comment }}
            </div>
        </div>
        @empty
        <div class="text-gray-500 text-center">
            <span> No Comments Posted</span>
        </div>
        @endforelse
    </div>
    <div>
        {{$this->comments->links() }}
    </div>
</div>