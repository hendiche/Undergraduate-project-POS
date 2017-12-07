<?php

namespace App\Models;

use app\Models\Base\BaseModel;
use app\Models\Food;
use app\Models\Purchase;
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

    public function food() {
    	return $this->belongsToMany(Food::class,'food_menus');
    }

    public function purchase() {
    	return $this->belongsToMany(Purchase::class,'menu_purchases');
    }

}
