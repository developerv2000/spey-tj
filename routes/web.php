<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AtxController;
use App\Http\Controllers\InterestingController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NosologyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScienceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/redirects.php';

Route::get('/', [MainController::class, 'home'])->name('home');
Route::post('/search', [MainController::class, 'search'])->name('search');

Route::prefix('about')->controller(AboutController::class)->name('about.')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/history', 'history')->name('history');
  Route::get('/wealth', 'wealth')->name('wealth');
  Route::get('/career', 'career')->name('career');
});

Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/all', 'all')->name('all');
  Route::get('/{slug}', 'show')->name('show');
});

Route::controller(NosologyController::class)->name('nosology.')->group(function () {
  Route::get('/nosology', 'index')->name('index');
  Route::get('/nosology/{slug}', 'show')->name('show');
});

Route::controller(AtxController::class)->name('atx.')->group(function () {
  Route::get('/atx', 'index')->name('index');
  Route::get('/atx/{slug}', 'show')->name('show');
});

Route::prefix('science')->controller(ScienceController::class)->name('science.')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/categories/{slug}', 'showCategory')->name('categories.show');
});

Route::prefix('interesting')->controller(InterestingController::class)->name('interesting.')->group(function () {
  Route::get('/', 'index')->name('index');
  Route::get('/videos', 'videos')->name('videos');

  Route::get('/posts', 'posts')->name('posts');
  Route::get('/posts/categories/{slug}', 'showCategory')->name('categories.show');
});

Route::prefix('posts')->controller(PostController::class)->name('posts.')->group(function () {
  Route::get('/{slug}', 'show')->name('show');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
