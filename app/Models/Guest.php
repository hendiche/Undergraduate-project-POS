<?php

namespace App\Models;

use app\Models\Base\BaseModel;
use app\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Guest extends BaseModel
{
    protected $fillable = [
    	'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function purchase() {
    	return $this->hasMany(Purchase::class);
    }
}
