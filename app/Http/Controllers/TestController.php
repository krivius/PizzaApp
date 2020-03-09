<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    //
    public function index(){
        return view('test', [
            'pizzas'=>Pizza::all()->where('is_available', '=', '1')
        ]);
    }

    public function test(){
        $qwe = request()->all();
//        dd($qwe);
//        echo 'success';

//        Cookie::set('cartContents', $qwe);

    }


}
