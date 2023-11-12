<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Top;
use App\Support\Helper;
use Illuminate\Http\Request;

class TopController extends Controller
{
  const IMAGE_PATH = 'img/top-products';

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'id';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Top::select('*', 'id as title')
      ->orderBy('title')
      ->get();

    // display as list in table
    $items = Top::orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.top.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function edit(Request $request, $id)
  {
    $item = Top::find($id);
    $products = Product::orderBy('title')->select('id', 'title')->get();

    return view('dashboard.top.edit', compact('item', 'products'));
  }

  public function update(Request $request)
  {
    $item = Top::find($request->id);
    $item->product_id = $request->product_id;

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'image', uniqid(), self::IMAGE_PATH);

    $item->save();

    return redirect()->back();
  }
}
