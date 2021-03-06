<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description'); //what's on the pizza
            $table->text('full_info'); //full description. TODO: replace "LOREM IPSUM"
            $table->bigInteger('type'); //hot / meat / vegan etc.
            $table->boolean('thickness'); //dough thickness
            $table->decimal('price', 8, 2);
            $table->decimal('weight', 5,2);
            $table->bigInteger('size');
            $table->boolean('is_available')->default(TRUE); // set to FALSE if pizza is not for sale anymore
            $table->string('image_addr'); //public/images/pizza/...
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
