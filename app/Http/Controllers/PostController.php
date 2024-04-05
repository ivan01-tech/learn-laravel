<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFilterRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{

    public function create()
    {
        return view('blog.create');
    }


    public function store(PostFilterRequest $request)
    {
        // dd($request->all());
        $post = Post::create([
            "title" => $request->input("title"),
            "content" => $request->input("content"),
            "slug" => Str::slug($request->input("title")),
        ]);
        // dd($post);
        return redirect()->route("blog.show", [
            "post" => $post->id,
            "slug" => $post->slug,
        ])->with('success', "Successfully created !");
    }
    public function index(Request $request)
    {

        // $post = new Post();
        // $post =  Post::findOrFail((3));
        // return null if not find
        // $post =  Post::find((2));
        // 
        $post =  Post::paginate(2);
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

        return view("blog.content", [
            "posts" => $post
        ]);

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

    }

    // 
    // model binding here !
    function getPostById(Request $request, string $slug, Post $post)
    {
        // $post  = Post::findOrFail($post);

        if ($post->slug !== $slug) {
            return to_route("blog.show", ["slug" => $post->slug, "id" => $post]);
        }
        // return [
        //     "slug" => $slug,
        //     "url" => $request->url(),
        //     "id" => $id,
        // ];

        // return $post;

        return view("blog.show", [
            "post" => $post
        ]);
    }
}
