<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\User;
use App\Models\Menu;
use App\Models\Custom;
use App\Models\Guest;
use Illuminate\Database\Eloquent\Model;

class Purchase extends BaseModel
{
    protected $fillable = [
    	'total','type','number','note','user_id','guest_id','status'
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
