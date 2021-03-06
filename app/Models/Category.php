<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $fillable = [
    	'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
