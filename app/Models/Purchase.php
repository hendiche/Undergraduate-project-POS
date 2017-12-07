<?php

namespace App;

use app\Models\Base\BaseModel;
use app\Models\User;
use app\Models\Menu;
use app\Models\Custom;
use app\Models\Guest;
use Illuminate\Database\Eloquent\Model;

class Purchase extends BaseModel
{
    protected $fillable = [
    	'total','type','number','note','user_id','guest_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function guest() {
    	return $this->belongsTo(Guest::class);
    }

    public function custom() {
    	return $this->belongsToMany(Custom::class);
    }

	public function menu() {
    	return $this->belongsToMany(Menu::class);
    }
}
