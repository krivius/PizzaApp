<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $fillable = ['name', 'phone', 'comment', 'delivery_address', 'payment_type'];

    public function confirm(){
        $this->is_confirmed = true;
        $this->save();
    }
    public function complete(){
        $this->is_complete = true;
        $this->save();
    }
}
