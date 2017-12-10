<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Food;
use Illuminate\Database\Eloquent\Model;

class Custom extends BaseModel
{
    protected $fillable = [
    	'total'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function food() {
    	return $this->belongsToMany(Food::class,'custom_foods');
    }

    public function purchase() {
        return $this->belongsToMany(Purchase::class,'custom_purchases');
    }
}
