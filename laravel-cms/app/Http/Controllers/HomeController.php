<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{

    public function __invoke(Request $request)
    {
        $featuredPosts = Cache::remember('featuredPosts', Carbon::now()->addDay(), function () {
            return Post::published()
                ->with('author')
                ->featured()
                ->latest('published_at')
                ->take(3)
                ->get();
        });


        $latestPosts = Cache::remember('latestPosts', Carbon::now()->addDay(), function () {
            return Post::published()
                ->with('author')
                ->latest('published_at')
                ->take(9)
                ->get();
        });


        if (empty($featuredPosts)) {
            return new NotFoundHttpException('No Featured Posts!', null, 404);
        }

        if (empty($latestPosts)) {
            return new NotFoundHttpException('No Latest Posts!', null, 404);
        }

        return view('home', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts,
        ]);
    }
}
