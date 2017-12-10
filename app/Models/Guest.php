<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Guest extends BaseModel
{
    protected $fillable = [
    	'name','phone','address'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function purchase() {
    	return $this->hasMany(Purchase::class);
    }
}
