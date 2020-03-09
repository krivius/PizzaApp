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

Route::get('/cart', 'cartController@index');
/*Route::get('/cart', function () {
    $cartData = request('cartData');
    return view('cart', ['cartData' => $cartData]);
});*/
/*
Route::get('/test', function () {
    $name = ["qwe"=>"rty", "foo"=>"bar"];
    return view('test', $name);
});*/



Route::get('/special-offers', function () {
    return view('special-offers');
});

Route::get('/', 'PizzaController@index'); //get a list of all the pizzas available in the menu

Route::get('/pizza/{pizza}', 'PizzaController@show'); //get full description of a selected pizza

Route::post('/test', 'TestController@test');


