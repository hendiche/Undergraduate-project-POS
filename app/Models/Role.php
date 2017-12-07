<?php

namespace App;

use app\Models\Base\BaseModel;
use app\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends BaseModel
{
    protected $fillable = [
    	'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user() {
    	return $this->hasMany(User::class);
    }
}
