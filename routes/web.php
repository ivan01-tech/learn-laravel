<?php

use App\Models\Post;
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

        // $post = new Post();
        // $post =  Post::findOrFail((3));
        // return null if not find
        // $post =  Post::find((2));
        // 
        $post =  Post::paginate(20);
        // $post =  Post::paginate(10, ["id", "title"]);

        // $post =  Post::where('id', ">=", 0)->update([
        //     "title" => "Title modified !"
        // ]);

        // $post->title = "Updated title";

        // $post->save();

        // $post = Post::create([
        //     "title" => "the thrid  title",
        //     "slug" => "the-thrid-title",
        //     "content" => "lorem ipsum dolor sit amet, consectetur adipis"
        // ]);

        return $post;

        // return [
        //     "name" => "Bonjour",
        //     "path" => $request->path(),
        //     "url" => $request->url(),
        //     // "age" => $_GET["age"],
        //     "params" => $request->all(),
        //     "link" => route("blog.show", ["slug" => "artcile_du_jour", "id" => 12]),
        //     "inputage" => $request->input("age", "20")
        // ];

        // $post->title = "deuxieme article";
        // $post->content = "published article published by members : deuxieme";
        // $post->slug = "mon-deuxieme-article";
        // $post->save();

        // $posts = $post->all(["id", "title"]);

        // die and debug 
        // dd($posts->first());

    })->name('blog.index');

    Route::get("/{slug}-{id}", function (Request $request, string $slug, string $id) {
        $post  = Post::findOrFail($id);
        if ($post->slug !== $slug) {
            return to_route("blog.show", ["slug" => $post->slug, "id" => $id]);
        }
        // return [
        //     "slug" => $slug,
        //     "url" => $request->url(),
        //     "id" => $id,
        // ];

        return $post;
    })->where(["id" => "[0-9]+", "slug" => "[0-9A-Za-z\.\-\_]+"])->name('blog.show');
});
