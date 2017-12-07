<?php

namespace App\Models;

use app\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Slider extends BaseModel
{
    protected $fillable = [
    	'cover'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
