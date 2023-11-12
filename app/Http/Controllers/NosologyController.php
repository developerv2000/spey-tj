<?php

namespace App\Http\Controllers;

use App\Models\Nosology;
use App\Models\Product;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NosologyController extends Controller
{
  public function index()
  {
    $activeCategory = null;
    $pageTitle = 'Все продукты';
    $products = Product::orderBy('title')->paginate(15);
    $categories = Nosology::orderBy('title')->get();

    return view('products.nosology', compact('activeCategory', 'pageTitle', 'products','categories'));
  }

  public function show($slug)
  {
    $activeCategory = Nosology::where('slug', $slug)->firstOrFail();
    $pageTitle = $activeCategory->title;
    $products = $activeCategory->products()->orderBy('title')->paginate(15);
    $categories = Nosology::orderBy('title')->get();

    return view('products.nosology', compact('activeCategory', 'pageTitle', 'products', 'categories'));
  }

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Nosology::orderBy('title')
      ->get();

    // display as list in table
    $items = Nosology::orderBy($orderBy, $orderType)
      ->withCount('products')
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.nosology.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.nosology.create');
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('nosologies'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Нозология с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Nosology();
    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Nosology::class);
    $item->save();

    return redirect()->route('nosology.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Nosology::find($id);

    return view('dashboard.nosology.edit', compact('item'));
  }

  public function update(Request $request)
  {
    $item = Nosology::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('nosologies')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Нозология с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Nosology::class, $item->id);
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
      Nosology::find($id)->delete();
    }

    return redirect()->route('nosology.dashboard.index');
  }
}
