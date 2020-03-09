<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function index(){
        $cartData = request('cartData');
        return view('cart', ['cartData' => $cartData]);
    }
}
