<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cate = new Category();
        $cate->name = 'Beef'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Chicken'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Seafood'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Vegetarian'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Side Dishes'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Dessert'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Hot Drinks'
        $cate->save();

        $cate = new Category();
        $cate->name = 'Cold Drinks'
        $cate->save();
    }
}
