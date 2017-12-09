<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Category;
use App\Models\Custom;
use App\Models\Menu;
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
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function custom() {
    	return $this->belongsToMany(Custom::class);
    }
    public function menu() {
    	return $this->belongsToMany(Menu::class);
    }
}
