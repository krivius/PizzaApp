<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function index(){
        $cartData = request('cartData');
        $images = [];


//        dd(json_decode($cartData));

        if($cartData){
            foreach (json_decode($cartData) as $pizza){
                $query = DB::select('SELECT image_addr FROM pizzas WHERE id="'.$pizza->id.'"');
                $images[] = $query[0]->image_addr;
            }
            return view('cart', [
                'cartData' => $cartData,
                'images'=>$images
            ]);
        }else{
            return view('emptyCart');
        }

    }
}
