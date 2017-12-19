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
use PDF;
use View;

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

    public function goReceipt() {
        $purchase = Purchase::find(8);
        return view('admin.receipt')->with('purchase',$purchase);
    }

    public function changeStatus($model) {
        $model = Purchase::find($model);
        if ($model->status == 0) {
            $model->status = 1;

        } else {
            $model->status = 0;
        }
        $model->save();
        return back();
    }

    public function getReceipt($model) {
        $model = Purchase::find($model);
        $html = View::make('admin.receipt')
            ->with('purchase',$model)
            ->render();
        $pdf = PDF::loadHTML($html);
        return $pdf->download('Receipt.pdf');
    }
    public function prepareDataTable($model)
    {
        return Datatables::of($model::query()->orderBy('created_at','desc'));
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
    	$model->number = $this->generateRandomString();
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

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return strtoupper($randomString);
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
                if ($model->status == PurchaseStatus::UNCOMPLETED) {
                    return $this->makeActionButtonsForDataTable($model).'<a class="btn btn-primary" href="mark/'.$model->id.'"><i class="fa fa-exchange" aria-hidden="true"></i> Change Status</a>';
                } 
                return $this->makeActionButtonsForDataTable($model).'<a class="btn btn-primary" href="mark/'.$model->id.'"><i class="fa fa-exchange" aria-hidden="true"></i> Change Status</a>'.'<a class="btn btn-success" href="receipt/'.$model->id.'"><i class="fa fa-download" aria-hidden="true"></i> Print Receipt</a>';
            })
            ->editColumn('status', function ($model) {
                if ($model->status == 0) {
                    return '<p style="color:red"> <strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
                } 
                return '<p style="color:green"> <strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
            })
            ->addColumn('order', function($model) {
                $order = '';
                foreach ($model->customs()->get() as $key => $customs) {
                    $order .= '<p> <strong> Custom No.'.$customs->id.' x '.$customs->pivot->quantity.'</strong></p><ul>';
                    foreach ($customs->foods()->get() as $key => $custom) {
                        $order.= '<li>'.$custom->name.'</li>';
                    }
                    $order .= '</ul>';
                }

                foreach ($model->menus()->get() as $key => $menus) {
                    $order .= '<p> <strong>'.$menus->name.' x '.$menus->pivot->quantity.'</strong></p><ul>';
                    foreach ($menus->foods()->get() as $key => $menu) {
                        $order.= '<li>'.$menu->name.'</li>';
                    }
                    $order .= '</ul>';
                }
                return $order;
            })
            ->addColumn('customer', function($model) {
                $customer = '';
                if ($model->user()->first()) {
                    $customer .= '<ul>
                    <li>Name: '.$model->user->name.'</li>
                    <li>Phone: '.$model->user->phone.'</li>
                    <li>Email: '.$model->user->email.'</li>
                    <li>Address: '.$model->user->address.'</li>
                    </ul>';
                } else {
                    $customer .= '<ul>
                    <li>Name: '.$model->guest->name.'</li>
                    <li>Phone: '.$model->guest->phone.'</li>
                    <li>Address: '.$model->guest->address.'</li>
                    </ul>';
                }
                return $customer;
            })
            ->rawColumns(['action','order','status','customer'])
            ->make(true);
    }
    public function logout() {
    	Auth::logout();
    	return redirect('/');
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
