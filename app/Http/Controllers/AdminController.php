<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use Auth;
use App\Helpers\Enums\PurchaseStatus;
use App\Helpers\Enums\PurchaseType;
use App\Models\Purchase;
use App\Models\Food;
use App\Models\Custom;
use App\Models\Menu;
use Route;

class AdminController extends MasterController
{
	protected $show_view = 'admin.dashboard.index';
    protected $create_view = 'admin.dashboard.form';
    protected $edit_view = 'admin.dashboard.form';
    protected $route_bind_model = 'dashboard'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'dashboard.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Purchase::class);
        return $this->dataTableMaker($builder);
    }

    public function dashboard() {
    	return view('admin.dashboard.index');
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('food',Food::where('status',1)->pluck('name','id'))->with('menu',Menu::where('status',1)->pluck('name','id'));
    }

    public function dataTableMaker($builder)
    {    
        return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model).'<a class="btn btn-primary" href="/admin/purchase/mark/'.$model->id.'"><i class="fa fa-exchange" aria-hidden="true"></i> Change Status</a>';
            })
            ->editColumn('status', function ($model) {
                if ($model->status == 0) {
                    return '<p style="color:red"> <strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
                } 
                return '<p style="color:green"> <strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
            })
            ->addColumn('order', function($model) {
                return '';
            })
            ->rawColumns(['action','order','status'])
            ->make(true);
    }
    public function logout() {
    	Auth::logout();
    	return redirect()->route('frontend.home');
    }
}
