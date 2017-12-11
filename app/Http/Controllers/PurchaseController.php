<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\Purchase;
use App\Models\Food;
use App\Models\Custom;
use App\Models\Menu;
use DB;
use Auth;
use App\Helpers\Enums\PurchaseStatus;
use App\Helpers\Enums\PurchaseType;
use Route;

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

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Purchase::class);
        return $this->dataTableMaker($builder);
    }

    public function update($model)
    {
        return redirect('/admin/purchase');
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
            ->addColumn('customer', function($model) {
                if ($model->type == 0) {
                    return $model->user->name;
                }
                return $model->guest->name;
            })
            ->rawColumns(['action', 'cover','foods','status'])
            ->make(true);
    }

    public function makeActionButtonsForDataTable($model)
    {
        $routeParameter = [$this->route_bind_model => $model->id];
        $routeShow = property_exists($this, 'route_for_show') ?
            $this->route_for_show :
            $this->routeMaker($this->restful['show']);
        if (Route::has($routeShow)) {
            $result['show'] = method_exists($this, 'dataTableShowButton') ?
                $this->dataTableShowButton($model) :
                '<a href="'.route($routeShow, $routeParameter).'"
                    class="btn btn-primary show">
                    <span class="fa fa-eye"></span> Show
                </a>';
        }
        $routeEdit = property_exists($this, 'route_for_edit') ?
            $this->route_for_edit :
            $this->routeMaker($this->restful['edit']);
        if (Route::has($routeEdit)) {
            $result['edit'] = method_exists($this, 'dataTableEditButton') ?
                $this->dataTableEditButton($model) :
                '<a href="'.route($routeEdit, $routeParameter).'"
                    class="btn btn-warning edit">
                    <span class="fa fa-pencil"></span> Details
                </a>';
        }
        $routeDestroy = property_exists($this, 'route_for_destroy') ?
            $this->route_for_destroy :
            $this->routeMaker($this->restful['destroy']);
        if (Route::has($routeDestroy)) {
            $result['delete'] = method_exists($this, 'dataTableDeleteButton') ?
                $this->dataTableDeleteButton($model) :
                '<a href="#delete_modal" onclick="deleteConfirmation(\''.route($routeDestroy, $routeParameter).'\')"
                    data-toggle="modal" class="btn btn-danger delete">
                    <span class="fa fa-trash"></span> Delete
                </a>';
        }
        $result['other'] = method_exists($this, 'dataTableOtherButton') ?
            $this->dataTableOtherButton($model) : '';
        $final = [];
        foreach ($this->datatable_buttons as $button) {
            $final[] = $result[$button];
        }
        return implode('', $final);
    }

    public function edit($model)
    {
        $view = property_exists($this, 'edit_view') ? $this->edit_view : $this->form_view;
        $this->attributes['method'] = 'PUT';
        $this->attributes['route'] = $this->getFormRoute($model);
        $info;
        if ($model->type == PurchaseType::USER) {
            $info = $model->user()->first();
        } else {
            $info = $model->guest()->first();
        }

        $status = '';
        if ($model->status == PurchaseStatus::COMPLETED) {
            $status = '<p class="form-control col-md-7 col-xs-12" style="color:green"><strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
        } else {
            $status = '<p class="form-control col-md-7 col-xs-12" style="color:red"><strong>'.PurchaseStatus::getString($model->status).'</strong></p>';
        }
        return $this->render(view($view), $model)->with('customs',$model->customs()->get())->with('menus',$model->menus()->get())->with('info',$info)->with('status',$status);
    }
}
