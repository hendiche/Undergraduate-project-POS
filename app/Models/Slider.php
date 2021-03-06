<?php

namespace App\Models;

use App\Models\Base\BaseModel;
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
