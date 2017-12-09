<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Food;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Menu extends BaseModel
{
    protected $fillable = [
    	'name','price','status','cover'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function foods() {
    	return $this->belongsToMany(Food::class,'food_menus');
    }

    public function purchase() {
    	return $this->belongsToMany(Purchase::class,'menu_purchases');
    }

}
