<?php

use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$food = new Food();
    	$food->name = 'Nasi Putih';
    	$food->price = 3000;
    	$food->status = 1;
    	$food->cover = 'asd.png';
    	$food->category_id = 1;
    	$food->save();

    	$food = new Food();
    	$food->name = 'Rendang Sapi';
    	$food->price = 10000;
    	$food->status = 1;
    	$food->cover = 'asd.png';
    	$food->category_id = 2;
    	$food->save();

        $food = new Food();
        $food->name = 'Ayam Gulai';
        $food->price = 9000;
        $food->status = 1;
        $food->cover = 'asd.png';
        $food->category_id = 3;
        $food->save();

        $food = new Food();
        $food->name = 'Ayam Goreng';
        $food->price = 9000;
        $food->status = 1;
        $food->cover = 'asd.png';
        $food->category_id = 3;
        $food->save();

        $food = new Food();
        $food->name = 'Gulai Nangka';
        $food->price = 3000;
        $food->status = 1;
        $food->cover = 'asd.png';
        $food->category_id = 5;
        $food->save();

        $food = new Food();
        $food->name = 'Sambal Balado Merah';
        $food->price = 1000;
        $food->status = 1;
        $food->cover = 'asd.png';
        $food->category_id = 6;
        $food->save();
    }
}
