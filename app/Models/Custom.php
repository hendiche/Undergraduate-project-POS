<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Food;
use App\Models\Purchase;
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

    public function foods() {
    	return $this->belongsToMany(Food::class,'custom_foods')->withPivot('quantity', 'subtotal');
    }

    public function purchases() {
        return $this->belongsToMany(Purchase::class,'custom_purchases')->withPivot('quantity', 'subtotal');
    }
}
