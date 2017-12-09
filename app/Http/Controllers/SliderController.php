<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Storage;

class SliderController extends MasterController
{
    protected $show_view = 'admin.slider.index';
    protected $create_view = 'admin.slider.form';
    protected $edit_view = 'admin.slider.form';
    protected $route_bind_model = 'slider'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'slider.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

   	public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Slider::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
    	$request = $this->getRequest();
    	if (!$model) {
    		$model = new Slider();
    	}
    	$model->cover = url('/image/slider/'.$this->uploadFiles($request->cover,$model));
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
            ->editColumn('cover', function ($model) {
            	return '<img src="'.$model->cover.'" style="height:200px;"/>';
            })
            ->rawColumns(['action', 'cover'])
            ->make(true);
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

    public function getFileByName($pathName,$fileName)
    {
        $path = Storage_path().'/app/'.$pathName.'/'.$fileName;
        return response()->file($path);
    }
    //end upload photo
}
