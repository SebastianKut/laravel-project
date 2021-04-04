<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
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
        // Using built in method passing Post $post(this has to be named the same as {wildcard} in the router, in this case $post) as an argument to the show function, this by default finds by id, if you  want to use slug
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

        //if theres a tag query in the request show only those articles with the tag else show all

        if (request('tag')) {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
        } else {
            $posts = Post::latest()->paginate(2);
        }

        return view('archive', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $tags = Tag::all();

        return view('create', ['tags' => $tags]);
    }

    public function store()
    {
        //validation
        request()->validate([
            'slug' => ['required', 'min:3'],
            'title' => 'required',
            'body' => 'required',
            // the below means that each tags id (that we passing in array) exists in tags table 
            'tags' => 'exists:tags,id'
        ]);


        //One way to get data from request send by our form and persist to database
        // $post = new Post;

        // $post->slug = request('slug');
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        // Better way is to use Model::create method from Laravel but you have to define fillable fields in the Model
        // This assigns attributes and saves it all in one go
        $post = Post::create([
            'slug'      => request('slug'),
            'title'     => request('title'),
            'body'      => request('body'),
            // hardcoded user id for now
            'user_id'   => 2,
        ]);

        // attach method attaches tags to post via linking table
        $post->tags()->attach(request('tags'));

        return redirect('/posts/' . $post['slug']);
    }

    //One way to do querries to database writing a query
    public function edit($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

        return view('edit', ['post' => $post]);
    }


    //Another way is to use (Post $wildcardName) and then laravel queries db behind the scenes only works by default with id
    //if using slug or something else have to overwrite getRouteKeyName() in the Model
    public function update(Post $post) // -THIS AUTOMATICALLY SEARCHES BEHIND THE SCENES FOR THE RIGHT POST BY {post} WILDCARD WHICH HERE IS A 'slug' field as defined in the route
    {
        // request()->validate([
        //     'slug' => ['required', 'min:3'],
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        // // $post = Post::where('slug', $slug)->firstOrFail();

        // $post->slug = request('slug');
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        //  This is how to further clean up the above code

        $validatedAttributes = request()->validate([  // VALUES FROM PUT REQUEST GET VALIDATED AND ASSIGNED TO THE VARIABLE $validatedAttributes 
            'slug' => ['required', 'min:3'],
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($validatedAttributes);    //TO UPDATE POST IN THE DATABASE LARAVEL STYLE WE CALL UPDATE METHOD FROM OUR $post (WHICH IS OUR POST FROM DATABASE FOUND BY LARAVEL BEHIND THE SCENES) AND PASS OUR VALIDATED VALUES

        return redirect('/posts/' . $post->slug);
    }

    // TO FURTHER ABSTRACT THE ABOVE METHOD WE CAN DO BELOW

    // public function update(Post $post)
    // {
    //     $post->update(request()->validate([
    //         'slug' => ['required', 'min:3'],
    //         'title' => 'required',
    //         'body' => 'required',
    //     ]));

    //     return redirect('/posts/' . $post->slug);
    // }

    //OR EVEN FURTHER

    // public function update(Post $post)
    // {
    //     $post->update($this->validatePost());

    //     return redirect('/posts/' . $post->slug);
    // };

    // protected function validatePost() 
    // {
    //      return request()->validate([
    //         'slug' => ['required', 'min:3'],
    //         'title' => 'required',
    //         'body' => 'required',
    //     ]);
    // };
}
