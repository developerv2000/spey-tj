<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Video;

class InterestingController extends Controller
{
  public function index()
  {
    $latestVideos = Video::latest()->take(3)->get();
    $latestPosts = Post::interesting()->latest()->take(4)->get();

    return view('interesting.index', compact('latestVideos', 'latestPosts'));
  }

  public function videos()
  {
    $videos = Video::latest()->paginate(6);

    return view('interesting.videos', compact('videos'));
  }

  public function posts()
  {
    $categories = Category::interesting()->orderBy('title')->get();
    $latestPosts = Post::interesting()->latest()->take(4)->get();

    return view('interesting.posts', compact('categories', 'latestPosts'));
  }

  public function showCategory($slug)
  {
    $category = Category::where('slug', $slug)->firstOrFail();
    $posts = $category->posts()->where('interesting', true)->latest()->paginate(8);

    return view('categories.show', compact('category', 'posts'));
  }
}
