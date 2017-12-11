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
    	return $this->belongsTo(User::class,'user_id');
    }

    public function guest() {
    	return $this->belongsTo(Guest::class,'guest_id');
    }

    public function customs() {
    	return $this->belongsToMany(Custom::class,'custom_purchases')->withPivot('quantity','subtotal');
    }

	public function menus() {
    	return $this->belongsToMany(Menu::class,'menu_purchases')->withPivot('quantity','subtotal');
    }
}
