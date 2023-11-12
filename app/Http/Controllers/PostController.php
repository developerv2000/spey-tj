<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
  const IMAGE_PATH = 'img/posts';
  const PDF_PATH = 'pdf/posts';

  public function show($slug)
  {
    $post = Post::where('slug', $slug)->firstOrFail();
    $fontSize = isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : 'medium';

    $previousRoute = Helper::getPreviousRouteName();

    return view('posts.show', compact('post', 'fontSize', 'previousRoute'));
  }

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Post::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Post::orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.posts.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    $categories = Category::orderBy('title')->get();

    return view('dashboard.posts.create', compact('categories'));
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('posts'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Пост с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Post();
    $fields = ['title', 'body', 'scientific', 'interesting'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Post::class);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);
    Helper::createThumb(self::IMAGE_PATH, $item->image, 320, 209);

    Helper::uploadModelsFile($request, $item, 'pdf', $item->slug, self::PDF_PATH);
    $item->save();

    $item->categories()->attach($request->categories);

    return redirect()->route('posts.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Post::find($id);

    $categories = Category::orderBy('title')->get();

    return view('dashboard.posts.edit', compact('item', 'categories'));
  }

  public function update(Request $request)
  {
    $item = Post::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('posts')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Пост с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title', 'body', 'scientific', 'interesting'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Post::class, $item->id);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);
    //create thumb
    if ($request->image) {
      Helper::createThumb(self::IMAGE_PATH, $item->image, 320, 209);
    }

    Helper::uploadModelsFile($request, $item, 'pdf', $item->slug, self::PDF_PATH);
    $item->save();

    $item->categories()->detach();
    $item->categories()->attach($request->categories);

    return redirect()->back();
  }

  /**
   * Request for deleting items by id may come in integer type (destroy single item form)
   * or in array type (destroy multiple items form)
   * That`s why we need to get id in array type and delete them by loop
   *
   * Checkout Model Boot methods deleting function
   * Models relations also deleted on deleting function of Models Boot method
   */
  public function destroy(Request $request)
  {
    $ids = (array) $request->id;

    foreach ($ids as $id) {
      Post::find($id)->delete();
    }

    return redirect()->route('posts.dashboard.index');
  }
}
