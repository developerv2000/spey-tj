<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ScienceController extends Controller
{
  public function index()
  {
    $categories = Category::scientific()->get();
    $latestPosts = Post::scientific()->latest()->take(4)->get();

    return view('science.index', compact('categories', 'latestPosts'));
  }

  public function showCategory($slug)
  {
    $category = Category::where('slug', $slug)->firstOrFail();
    $posts = $category->posts()->where('scientific', true)->latest()->paginate(8);

    return view('categories.show', compact('category', 'posts'));
  }
}
