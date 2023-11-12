<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
  const IMAGE_PATH = 'img/categories';

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Category::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Category::orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.categories.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.categories.create');
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('categories'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Категория с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Category();
    $fields = ['title', 'scientific', 'interesting'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Category::class);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);

    $item->save();

    return redirect()->route('categories.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Category::find($id);

    return view('dashboard.categories.edit', compact('item'));
  }

  public function update(Request $request)
  {
    $item = Category::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('categories')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Категория с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title', 'scientific', 'interesting'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Category::class, $item->id);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);

    $item->save();

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
      Category::find($id)->delete();
    }

    return redirect()->route('categories.dashboard.index');
  }
}
