<?php

namespace App\Http\Controllers;

use App\Models\Atx;
use App\Models\Nosology;
use App\Models\Product;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
  const IMAGE_PATH = 'img/products';
  const INSTRUCTION_PATH = 'pdf/instructions';

  public function index()
  {
    $newProducts = Product::latest()->take(8)->get();
    $productsCount = Product::all()->count();

    return view('products.index', compact('newProducts', 'productsCount'));
  }

  public function all(Request $request)
  {
    $products = Product::query();
    $allProducts = Product::orderBy('title')->select('title', 'slug')->get();

    $allProductsCount = $allProducts->count();
    $rxProductsCount = Product::where('prescription', true)->count();
    $otcProductsCount = Product::where('prescription', false)->count();

    // get all letters
    $letters = [];

    foreach ($allProducts as $prod) {
      array_push($letters, mb_substr($prod->title, 0, 1));
    }

    // remove duplicate letters
    $letters = array_unique($letters);

    // get Active letter
    $activeLetter = $request->letter;
    if ($activeLetter) {
      $products = $products->where('title', 'LIKE', $activeLetter . '%');
    }

    $products = $products->orderBy('title')
      ->paginate(16)
      ->fragment('all-products')
      ->appends($request->except(['page', 'token']));

    return view('products.all', compact('products', 'allProducts', 'letters', 'activeLetter', 'allProductsCount', 'rxProductsCount', 'otcProductsCount'));
  }

  public function show($slug)
  {
    $product = Product::where('slug', $slug)->firstOrFail();

    return view('products.show', compact('product'));
  }

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Product::select('id', 'title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Product::select('id', 'title', 'image', 'prescription', 'popular', 'slug')
      ->orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.products.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    $nosology = Nosology::orderBy('title')->get();
    $atx = Atx::orderBy('title')->get();

    return view('dashboard.products.create', compact('atx', 'nosology'));
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('products'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Продукт с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Product();
    $fields = ['title', 'prescription', 'external_link', 'popular', 'description', 'composition', 'indication', 'usage'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Product::class);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);
    Helper::createThumb(self::IMAGE_PATH, $item->image, 380);

    Helper::uploadModelsFile($request, $item, 'instruction', $item->slug, self::INSTRUCTION_PATH);
    $item->save();

    $item->nosology()->attach($request->nosology);
    $item->atx()->attach($request->atx);

    return redirect()->route('products.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Product::find($id);

    $nosology = Nosology::orderBy('title')->get();
    $atx = Atx::orderBy('title')->get();

    return view('dashboard.products.edit', compact('item', 'nosology', 'atx'));
  }

  public function update(Request $request)
  {
    $item = Product::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('products')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Продукт с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title', 'prescription', 'external_link', 'popular', 'description', 'composition', 'indication', 'usage'];
    Helper::fillModelColumns($item, $fields, $request);
    $item->slug = Helper::generateUniqueSlug($item->title, Product::class, $item->id);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', $item->slug, self::IMAGE_PATH);
    //create thumb
    if ($request->image) {
      Helper::createThumb(self::IMAGE_PATH, $item->image, 380);
    }

    Helper::uploadModelsFile($request, $item, 'instruction', $item->slug, self::INSTRUCTION_PATH);
    $item->save();

    $item->nosology()->detach();
    $item->nosology()->attach($request->nosology);

    $item->atx()->detach();
    $item->atx()->attach($request->atx);

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
      Product::find($id)->delete();
    }

    return redirect()->route('products.dashboard.index');
  }
}
