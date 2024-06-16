@props(['post'])

<div class="md:col-span-1 col-span-3">
    <a href="#">
        <div>
            <img class="w-full rounded-xl"
                src="{{ $post->image }}">
        </div>
    </a>
    <div class="mt-3"><a href="#">
        </a>
        <div class="flex items-center mb-2"><a href="http://127.0.0.1:8000/blog/laravel-34">
            </a><a href="http://127.0.0.1:8000/categories/laravel" class="bg-red-600 
                    text-white 
                    rounded-xl px-3 py-1 text-sm mr-3">
                Laravel</a>
            <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
        </div>
        <h3 class="text-xl font-bold text-gray-900">Laravel 10 tutorial feed page #34</h3>
    </div>
</div>