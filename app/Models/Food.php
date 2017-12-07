<?php

namespace App;

use app\Models\Base\BaseModel;
use app\Models\Category;
use app\Models\Custom;
use app\Models\Menu;
use Illuminate\Database\Eloquent\Model;

class Food extends BaseModel
{
    protected $fillable = [
    	'name','price','status','cover','category_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function category() {
    	return $this->belongsTo(Category::class);
    }

    public function custom() {
    	return $this->belongsToMany(Custom::class);
    }

    public function menu() {
    	return $this->belongsToMany(Menu::class);
    }
}
