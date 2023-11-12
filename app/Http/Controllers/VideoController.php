<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Support\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VideoController extends Controller
{
  const VIDEO_PATH = 'videos';

  public function dashboardIndex(Request $request)
  {
    // Default parameters for ordering
    $orderBy = $request->orderBy ? $request->orderBy : 'title';
    $orderType = $request->orderType ? $request->orderType : 'asc';
    $activePage = $request->page ? $request->page : 1;

    // for search and counter
    $totalItems = Video::orderBy('title')
      ->get();

    // display as list in table
    $items = Video::orderBy($orderBy, $orderType)
      ->paginate(30, ['*'], 'page', $activePage)
      ->appends($request->except('page'));

    return view('dashboard.videos.index', compact('totalItems', 'items', 'orderBy', 'orderType', 'activePage'));
  }

  public function create()
  {
    return view('dashboard.videos.create');
  }

  public function store(Request $request)
  {
    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('videos'),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Видео с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $item = new Video();
    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'filename', uniqid(), self::VIDEO_PATH);

    $item->save();

    return redirect()->route('videos.dashboard.index');
  }

  public function edit(Request $request, $id)
  {
    $item = Video::find($id);

    return view('dashboard.videos.edit', compact('item'));
  }

  public function update(Request $request)
  {
    $item = Video::find($request->id);

    // validate request
    $validationRules = [
      'title' => [
        'required',
        Rule::unique('videos')->ignore($item->id),
      ],
    ];

    $validationMessages = [
      "title.unique" => "Видео с таким заголовком уже существует!",
    ];

    Validator::make($request->all(), $validationRules, $validationMessages)->validate();

    $fields = ['title'];
    Helper::fillModelColumns($item, $fields, $request);

    // upload files and update item columns
    Helper::uploadModelsFile($request, $item, 'filename', uniqid(), self::VIDEO_PATH);

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
      Video::find($id)->delete();
    }

    return redirect()->route('videos.dashboard.index');
  }
}
