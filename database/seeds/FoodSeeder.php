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
        $food->name = 'Ayam Gulai',
        $food->price = 9000,
        $food->status = 1,
        $food->cover = 'asd.png',
        $food->categoy_id = 1,
        $food->save();
    }
}
