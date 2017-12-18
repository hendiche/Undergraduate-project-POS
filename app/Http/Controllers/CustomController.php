<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MasterController;
use App\Models\Food;
use App\Models\Custom;
use Illuminate\Http\Request;

class CustomController extends MasterController
{
    protected $show_view = 'admin.custom.index';
    protected $create_view = 'admin.custom.form';
    protected $edit_view = 'admin.custom.form';
    protected $route_bind_model = 'custom'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'custom.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Custom::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Custom();
    	}

        if ($model) {
            $model->foods()->detach();
        }

    	$model->total = 0;

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }

        $total = 0;

        foreach ($request->food as $key => $value) {
        	$food = Food::find($value);
        	$price = $food->price * $request->quantity[$key];
        	$total += $price;
        	$model->foods()->attach($value,['quantity' => $request->quantity[$key],'subtotal' => $price]);
        }

        $model->total = $total;

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        
        return $this->sendSuccessResponse();
    }

    public function dataTableMaker($builder)
    {    
    	return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->addColumn('foods', function($model) {
                $foods = '';
                foreach ($model->foods()->get() as $key => $value) {
                    $foods .= '<p> -'.$value->name.'</p>';
                }
                return $foods;
            })
            ->rawColumns(['action', 'cover','foods','status'])
            ->make(true);
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('food',Food::where('status',1)->pluck('name','id'));
    }

    public function destroy($model)
    {
        if (count($model->purchases()->get()) > 0) {
            return redirect()->back()->withErrors('Cannot delete customs with a purchase');
        }
        $model->foods()->detach();
        if (!$model->delete()) {
            return $this->sendErrorResponse($model->errors());
        }

        return $this->sendSuccessResponse();
    }

    public function edit($model)
    {
        $view = property_exists($this, 'edit_view') ? $this->edit_view : $this->form_view;
        $this->attributes['method'] = 'PUT';
        $this->attributes['route'] = $this->getFormRoute($model);
        return $this->render(view($view), $model)->with('food',Food::where('status',1)->pluck('name','id'))->with('attaches',$model->foods()->get());
    }
}
