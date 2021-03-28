<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class PostsController extends Controller
// {
//     public function show($slug)
//     {
//         // $posts = [
//         //     'first' => 'This is first post',
//         //     'second' => 'This is second post'
//         // ];

//         // if (!array_key_exists($slug, $posts)) abort(404, "The post doesn't exist");

//         // return view('posts', [
//         //     'post' => $posts[$slug]
//         // ]);
//     }
// }


class PostsController extends Controller
{
    public function show(Post $post) //the variable passed to the function has to be the same as wildcard defined in the router {post}
    {
        //Get data from mysql database using queries

        //  $post = DB::table('posts')->where('slug', $slug)->first();

        //  if (!$post) abort(404);


        //OR
        //Using Eloquent and Model

        // $post = Post::where('slug', $slug)->firstOrFail();

        // OR
        // Using built in method passing Post $slug as an argument to the show function this only works for finding by id, if you  want to use slug
        // you have to overwrite getRouteKeyName method in the Model


        return view('post', [
            'post' => $post
        ]);
    }

    public function showLatest()
    {
        $posts = Post::take(3)->latest()->get();

        return view('posts', [
            'posts' => $posts
        ]);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(2);

        return view('archive', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        //validation
        request()->validate([
            'slug' => ['required', 'min:3'],
            'title' => 'required',
            'body' => 'required',
        ]);


        //One way to get data from request send by our form and persist to database
        $post = new Post;

        $post->slug = request('slug');
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts/' . $post->slug);
    }

    //One way to do querries to database writing a query
    public function edit($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('edit', ['post' => $post]);
    }


    //Another way is to use (Post $wildcardName) and then laravel queries db behind the scenes only works by default with id
    //if using slug or something else have to overwrite getRouteKeyName() in the Model
    public function update(Post $post)
    {
        request()->validate([
            'slug' => ['required', 'min:3'],
            'title' => 'required',
            'body' => 'required',
        ]);

        // $post = Post::where('slug', $slug)->firstOrFail();

        $post->slug = request('slug');
        $post->title = request('title');
        $post->body = request('body');
        $post->save();

        return redirect('/posts/' . $post->slug);
    }
}
