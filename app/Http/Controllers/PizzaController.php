<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index() //get a list of all the pizzas available in the menu
    {
        return view('welcome', [
            'pizzas'=>Pizza::all()->where('is_available', '=', '1')
        ]);

    }

    public function show(Pizza $pizza) //get full description of a selected pizza
    {
        return view('pizza.show', ['pizza'=>$pizza]);
    }
}
