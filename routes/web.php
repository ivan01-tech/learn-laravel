<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix("/blog")->controller(PostController::class)->group(function () {

    Route::get('/',  "index")->name('blog.index');
    Route::get('/new',  "create")->name('blog.create');
    Route::post('/new',  "store")->name('blog.store');
    // Route::get('', [PostController::class, "index"])->name('blog.index');

    Route::get("/{slug}-{post}", "getPostById")->where(["post" => "[0-9]+", "slug" => "[0-9A-Za-z\.\-\_]+"])->name('blog.show');
});
