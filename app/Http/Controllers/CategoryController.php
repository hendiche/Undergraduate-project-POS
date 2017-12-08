<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\MasterController;

class CategoryController extends MasterController
{
    protected $show_view = 'admin.category.index';
    protected $create_view = 'admin.category.form';
    protected $edit_view = 'admin.category.form';
    protected $route_bind_model = 'category'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'category.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Category::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
        if(!$model) {
            $model = new Category();
        }
        return $this->saveHandler($model);
    }

}
