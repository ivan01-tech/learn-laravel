<?php

use Illuminate\Http\Request;
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
Route::prefix("/blog")->group(function () {

    Route::get('', function (Request $request) {

        return [
            "name" => "Bonjour",
            "path" => $request->path(),
            "url" => $request->url(),
            // "age" => $_GET["age"],
            "params" => $request->all(),
            "link" => route("blog.show", ["slug" => "artcile_du_jour", "id" => 12]),
            "inputage" => $request->input("age", "20")
        ];
    })->name('blog.index');

    Route::get("/{slug}-{id}", function (Request $request, string $slug, string $id) {
        return [
            "slug" => $slug,
            "url" => $request->url(),
            "id" => $id,
        ];
    })->where(["id" => "[0-9]+", "slug" => "[0-9A-Za-z\.\-\_]+"])->name('blog.show');
});
