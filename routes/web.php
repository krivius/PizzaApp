<?php

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

Route::get('/cart', function () {
    $name = request('name');
    return view('cart', [
        'name'=> $name
    ]);
});

/*
Route::get('/posts/{post}', function ($post) {
    $posts =[
        "my-first-post" => "Hello, this im my first post!",
        "my-second-post" => "Now I'm gettin` the hang of this blogging thing!"
    ];

    if(! array_key_exists($post, $posts)){
        abort(404, 'Sorry, this page was not found.');
    }
    return view('posts', [
        "post" => $posts[$post]
    ]);
});*/
Route::get('/posts/{post}', 'PostsController@show');
