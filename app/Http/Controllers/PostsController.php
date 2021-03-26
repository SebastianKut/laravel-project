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
    public function show($slug)
    {
        //Get data from mysql database using queries

        //  $post = DB::table('posts')->where('slug', $slug)->first();

        //  if (!$post) abort(404);


        //OR
        //Using Eloquent and Model

        $post = Post::where('slug', $slug)->firstOrFail();

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
}
