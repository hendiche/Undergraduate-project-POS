<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class FoodController extends MasterController
{
    protected $show_view = 'admin.food.index';
    protected $create_view = 'admin.food.form';
    protected $edit_view = 'admin.food.form';
    protected $route_bind_model = 'food'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'food.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('category',Category::pluck('name','id'));
    }

    public function edit($model)
    {
        $view = property_exists($this, 'edit_view') ? $this->edit_view : $this->form_view;
        $this->attributes['method'] = 'PUT';
        $this->attributes['route'] = $this->getFormRoute($model);
        return $this->render(view($view), $model)->with('category',Category::pluck('name','id'));
    }

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Food::class);
        return $this->dataTableMaker($builder);
    }


   	public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Food();
    	}
    	$model->name = $request->name;
    	$model->price = $request->price;
    	$model->category_id = $request->category;
    	$model->status = $request->status;
    	$model->cover = url('/image/'.$this->uploadFiles($request->cover,$model));
        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        return $this->sendSuccessResponse();
    }


    //upload photo
    public function uploadFiles($file, $model = null)
    {
        if ($model) {
            if ($model->cover != '' || $model->cover) {
                Storage::delete(Storage_path().'/app/slider/'.$model->cover);
            }
        }
    
        return $this->uploadHandler($file);

    }

    public function uploadHandler($file)
    {
        $path = 'slider';
    
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }
    
        $fileName = time().'.'.$file->getClientOriginalExtension();
    
        $file->move(Storage_path().'/app/'.$path, $fileName);
    	
        return $fileName;
    }


    public function dataTableMaker($builder)
    {    
    	return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->editColumn('status', function ($model) {
            	return $model->status;
            })
            ->editColumn('category_id', function ($model) {
            	return $model->category->name;
            })
            ->editColumn('cover', function ($model) {
            	return '<img src="'.$model->cover.'" style="height:200px;"/>';
            })
            ->rawColumns(['action', 'cover'])
            ->make(true);
    }
}
