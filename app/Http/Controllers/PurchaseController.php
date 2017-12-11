<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\Purchase;
use App\Models\Food;
use App\Models\Menu;

class PurchaseController extends MasterController
{
    protected $show_view = 'admin.purchase.index';
    protected $create_view = 'admin.purchase.form';
    protected $edit_view = 'admin.purchase.form';
    protected $route_bind_model = 'purchase'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'purchase.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Purchase::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Purchase();
    	}
    	return $this->saveHandler($model);
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('food',Food::where('status',1)->pluck('name','id'))->with('menu',Menu::where('status',1)->pluck('name','id'));
    }
}
