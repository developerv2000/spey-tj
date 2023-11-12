<?php

use App\Http\Controllers\AtxController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NosologyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
*/

Route::redirect('/dashboard', '/dashboard/products');
Route::post('/upload-simditor-image', [MainController::class, 'uploadSimditorImage']);

Route::middleware('auth')->prefix('dashboard')->group(function () {

  Route::controller(ProductController::class)->prefix('/products')->name('products.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}/edit', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(NosologyController::class)->prefix('/nosology')->name('nosology.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(AtxController::class)->prefix('/atx')->name('atx.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(PostController::class)->prefix('/posts')->name('posts.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(CategoryController::class)->prefix('/categories')->name('categories.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });

  Route::controller(TopController::class)->prefix('/top')->name('top.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/update', 'update')->name('update');
  });

  Route::controller(VideoController::class)->prefix('/videos')->name('videos.')->group(function () {
    Route::get('/', 'dashboardIndex')->name('dashboard.index');
    Route::get('/create', 'create')->name('create');
    Route::get('/{id}', 'edit')->name('edit');

    Route::post('/store', 'store')->name('store');
    Route::post('/update', 'update')->name('update');
    Route::post('/destroy', 'destroy')->name('destroy');
  });
});
