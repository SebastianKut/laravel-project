<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    //get value of a parameter called 'name' from url request and assign to variable $somevariable
    $somevariable = request('name');

    //return view called 'test' and pass variable called 'name' that = to $somevariable
    //then in blade view we can return 'name'    
    return view('test', [
        'name' => $somevariable
        //or
        //'name' => request('name')
    ]);
});


//using wildcards {post}
// Route::get('/posts/{post}', function ($post) {

//     //create some mock data 
//     $posts = [
//         'first' => 'This is first post',
//         'second' => 'This is second post'
//     ];

//     //if value of wildcard {post} doesnt exist in an array $posts return 404

//     if (!array_key_exists($post, $posts)) abort(404, "The post doesn't exist");


//     return view('posts', [
//         'post' => $posts[$post]
//     ]);
// });


//Proper way of doing the above using CONTROLER
//we put the above callback function inside PostsController method called show
Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');


Route::get('/posts', 'App\Http\Controllers\PostsController@showLatest');
