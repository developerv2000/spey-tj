<?php

namespace App\Http\Controllers;

use App\Models\Atx;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Support\Helper;

class AtxController extends Controller
{
  public function index()
  {
    $activeCategory = null;
    $pageTitle = 'Все продукты';
    $products = Product::orderBy('title')->paginate(15);
    $categories = Atx::orderBy('title')->get();

    return view('products.atx', compact('activeCategory', 'pageTitle', 'products','categories'));
  }

  public function show($slug)
  {
    $activeCategory = Atx::where('slug', $slug)->firstOrFail();
    $pageTitle = $activeCategory->title;
    $products = $activeCategory->products()->orderBy('title')->paginate(15);
    $categories = Atx::orderBy('title')->get();

    return view('products.atx', compact('activeCategory', 'pageTitle', 'products', 'categories'));
  }

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Atx::orderBy('title')
      ->get();

    // display as list in table
    $items = Atx::orderBy($orderBy, $orderType)
      ->withCount('products')
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.atx.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.atx.create');
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('atxes'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "АТХ классификация с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Atx();
    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Atx::class);
    $item->save();

    return redirect()->route('atx.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Atx::find($id);

    return view('dashboard.atx.edit', compact('item'));
  }

  public function update(Request $request)
  {
    $item = Atx::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('atxes')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "АТХ классификация с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Atx::class, $item->id);
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
      Atx::find($id)->delete();
    }

    return redirect()->route('atx.dashboard.index');
  }
}
