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
use Datatables;

class AdminController extends MasterController
{
	protected $show_view = 'admin.dashboard.index';
    protected $create_view = 'admin.dashboard.form';
    protected $edit_view = 'admin.dashboard.form';
    protected $route_bind_model = 'dashboard'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'dashboard.index'; //Route Name
    protected $datatable_buttons = [
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Purchase::class);
        return $this->dataTableMaker($builder);
    }

    public function prepareDataTable($model)
    {
        return Datatables::of($model::query()->where('status',PurchaseStatus::UNCOMPLETED));
    }

    public function dashboard() {
    	return view('admin.dashboard.index');
    }

    public function destroy($model)
    {
    	$model->customs()->detach();
    	$model->menus()->detach();

        if (!$model->delete()) {
            return $this->sendErrorResponse($model->errors());
        }

        return $this->sendSuccessResponse();
    }

    public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Purchase();
    	}
    	$model->number = 'asdf';
    	$model->total = 0;
    	$model->type = PurchaseStatus::UNCOMPLETED;
    	$model->note = $request->note;
    	$model->user_id = Auth::user()->id;

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        $total = 0;
        if ($request->food) {
        	foreach ($request->food as $key => $value) {
        		$food = Food::find($value);
        		$total += $food->price;
        		$price = $food->price * $request->quantity[$key];
        		$model->customs()->attach($value,['quantity' => $request->quantity[$key],'subtotal' => $price]);
        	}
        }

        if ($request->menu) {
        	foreach ($request->menu as $key => $value) {
        		$menu = Menu::find($value);
        		$total += $menu->price;
        		$price = $menu->price * $request->menu_quantity[$key];
        		$model->menus()->attach($value,['quantity' => $request->menu_quantity[$key],'subtotal' => $price]);
        	}
        }

        $model->total = $total;

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }

        
        return $this->sendSuccessResponse();
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('food',Custom::pluck('id','id'))->with('menu',Menu::where('status',1)->pluck('name','id'));
    }

    public function dataTableMaker($builder)
    {    
        return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model).'<a class="btn btn-primary" href="mark/'.$model->id.'"><i class="fa fa-exchange" aria-hidden="true"></i> Change Status</a>';
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

    public function calculateCustom(Request $request) {
        $total = 0;
        if ($request->foods) {
        	foreach ($request->foods as $key => $food) {
            	$findFood = Custom::find($food);
            	if ($findFood) {
            	    $total += $findFood->total * $request->quantities[$key];
            	}
       		}
        }
        

        if ($request->menus) {
        	foreach ($request->menus as $key => $menu) {
            	$findMenu = Menu::find($menu);
            	if ($findMenu) {
            	    $total += $findMenu->price * $request->menu_quantity[$key];
            	}
        	}
        }
        
        return response($total);
    }

    public function calculateMenu(Request $request) {
        $total = 0;
        foreach ($request->menus as $key => $menu) {
            $findMenu = Menu::find($menu);
            if ($findMenu) {
                $total += $findMenu->price * $request->quantities[$key];
            }
        }
        
        return response($total);
    }
}
