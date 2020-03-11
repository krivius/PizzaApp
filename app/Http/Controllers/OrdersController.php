<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrdersController extends Controller
{
    public function store(){
        $data = request()->all();
//        dd($data);
        $get_phones = DB::select('SELECT DISTINCT phoneNum FROM clients');
        $phones = [];
        foreach ($get_phones as $phone){
            $phones[] = $phone->phoneNum;
        }

        if(!in_array($data["phoneNum"], $phones)){ //check if client in the DB
            DB::insert('INSERT INTO clients SET name="'.$data["clientName"].'", phoneNum="'.$data["phoneNum"].'"');
            $client_id = DB::getPDO()->lastInsertId();
        }else{
            $client_id = DB::select('SELECT id FROM clients WHERE  phoneNum="'.$data["phoneNum"].'"');
            $client_id= $client_id[0]->id;
        }

        $sql_1 = 'INSERT INTO orders SET client_tel="'.$data["phoneNum"].'", comment="'.$data["comment"].'",
                is_confirmed="0", delivery_address="'.$data["address"].'",
                total_price="'.number_format((float)$data["total"], 2, '.', '').'",
                payment_type="'.$data["paymentMethod"].'", courier_id="1", is_complete="0"';
        DB::insert($sql_1);
        $order_id = DB::getPDO()->lastInsertId();

        for ($i=0; $i<count($data["id"]); $i++){
            $sql_2 = 'INSERT INTO order_details SET order_id="'.$order_id.'",
            pizza_id="'.$data['id'][$i].'", amount="'.$data['quantity'][$i].'"';
            DB::insert($sql_2);
        }


        /*=========================================*/

        //get order history for specified phone number

        $sql_3 = 'select orders.id, order_details.pizza_id, order_details.amount, pizzas.name as pizza
                from (orders left join order_details on orders.id = order_details.order_id)
                left join pizzas on order_details.pizza_id = pizzas.id
                WHERE orders.client_tel="'.$data["phoneNum"].'"';

        $sql_4='select id from orders where client_tel="'.$data["phoneNum"].'"';
//        $history = DB::select($sql_3);
        $history = DB::select($sql_4);
        $arr = [];
//        dump($history);
        foreach ($history as $item){

            $sql_5 = 'select order_details.order_id from order_details  where order_details.id ="'.$item->id.'"';
            $details = DB::select($sql_5);
            foreach ($details as $detail){
                $sql_6='select order_details.amount, pizzas.name, pizzas.image_addr from
                        order_details left join pizzas on order_details.pizza_id = pizzas.id where order_details.order_id ="'.$detail->order_id.'"';
                $qwe = DB::select($sql_6);
                $arr_2 =[];
                foreach ($qwe as $od){
                    $arr_2[] =[$od->name, $od->image_addr, $od->amount];
                }
                $arr[$detail->order_id] = $arr_2;
            }
        }
        return view('createOrder', ['history'=>$arr]);
    }
}
