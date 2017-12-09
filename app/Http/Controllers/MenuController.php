<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MasterController;
use App\Models\Food;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends MasterController
{
    protected $show_view = 'admin.menu.index';
    protected $create_view = 'admin.menu.form';
    protected $edit_view = 'admin.menu.form';
    protected $route_bind_model = 'menu'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'menu.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Menu::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Menu();
    	}
    	$model->name = $request->name;
    	$model->price = $request->price;
    	$model->status = $request->status;
    	$model->description = $request->description;
    	$model->cover = url('/image/menu/'.$this->uploadFiles($request->cover,$model));

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        foreach ($request->food as $key => $value) {
        	$food = Food::find($value);
        	$price = $food->price * 1;
        	$model->foods()->attach($value,['quantity' => 1,'subtotal' => $price]);
        }
        
        return $this->sendSuccessResponse();
    }

    public function dataTableMaker($builder)
    {    
    	return $builder
            ->addColumn("action", function ($model) {
                return $this->makeActionButtonsForDataTable($model);
            })
            ->editColumn('cover', function ($model) {
            	return '<img src="'.$model->cover.'" style="height:200px;"/>';
            })
            ->rawColumns(['action', 'cover'])
            ->make(true);
    }

    public function destroy($model)
    {
    	$model->foods()->detach();
        if (!$model->delete()) {
            return $this->sendErrorResponse($model->errors());
        }

        return $this->sendSuccessResponse();
    }

    //upload photo
    public function uploadFiles($file, $model = null)
    {
        if ($model) {
            if ($model->cover != '' || $model->cover) {
                Storage::delete(Storage_path().'/app/menu/'.$model->cover);
            }
        }
    
        return $this->uploadHandler($file);

    }

    public function uploadHandler($file)
    {
        $path = 'menu';
    
        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }
    
        $fileName = time().'.'.$file->getClientOriginalExtension();
    
        $file->move(Storage_path().'/app/'.$path, $fileName);
    	
        return $fileName;
    }

    public function create()
    {
        $view = property_exists($this, 'create_view') ? $this->create_view : $this->form_view;
        $this->attributes['route'] = $this->getFormRoute();

        return $this->render(view($view))->with('food',Food::pluck('name','id'));
    }

    public function edit($model)
    {
        $view = property_exists($this, 'edit_view') ? $this->edit_view : $this->form_view;
        $this->attributes['method'] = 'PUT';
        $this->attributes['route'] = $this->getFormRoute($model);
        return $this->render(view($view), $model)->with('food',Food::pluck('name','id'))->with('attaches',$model->foods()->get());
    }
}
