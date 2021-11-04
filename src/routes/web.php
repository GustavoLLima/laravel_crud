<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ItemController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello2', function () {
    return "Hello World2";
});

Route::get('/posts/indexjson', [PostController::class, 'indexjson'])->middleware('auth');;

Route::get('/items/search', [ItemController::class, 'search'])->middleware('auth')->name('items.search');

Route::resource('posts', PostController::class)->middleware('auth');
Route::resource('types', TypeController::class)->middleware('auth');
Route::resource('levels', LevelController::class)->middleware('auth');
Route::resource('items', ItemController::class)->middleware('auth');

//Route::get('/posts/indexjson', PostController::class)->middleware('auth');
//Route::get('/posts/indexjson', [PostController::class, 'indexjson'])->middleware('auth');;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
