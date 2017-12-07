<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('password');

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });

        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');
            $table->string('type');
            $table->string('number');
            $table->string('note');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('guest_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('guest_id')->references('id')->on('guests');
            $table->timestamps();
        });

        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cover');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('foods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->boolean('status');
            $table->string('cover');
            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total');

            $table->timestamps();
        });

        Schema::create('custom_foods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->integer('quantity');
            $table->integer('subtotal');

            $table->foreign('custom_id')->references('id')->on('customs');
            $table->foreign('food_id')->references('id')->on('foods');
            
            $table->timestamps();
        });

        Schema::create('custom_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_id')->unsigned();
            $table->integer('purchase_id')->unsigned();
            $table->integer('quantity');
            $table->integer('subtotal');

            $table->foreign('custom_id')->references('id')->on('customs');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->boolean('status');
            $table->string('cover');
            $table->string('description');

            $table->timestamps();
        });


        Schema::create('food_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('food_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('quantity');
            $table->integer('subtotal');

            $table->foreign('food_id')->references('id')->on('foods');
            $table->foreign('menu_id')->references('id')->on('menus');
            
            $table->timestamps();
        });

        Schema::create('menu_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_id')->unsigned();
            $table->integer('menu_id')->unsigned();
            $table->integer('quantity');
            $table->integer('subtotal');

            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('menu_id')->references('id')->on('menus');
            
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
        Schema::dropIfExists('menu_purchases');
        Schema::dropIfExists('food_menus');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('custom_purchases');
        Schema::dropIfExists('custom_foods');
        Schema::dropIfExists('customs');
        Schema::dropIfExists('foods');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sliders');
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('guests');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
