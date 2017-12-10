<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Http\Controllers\MasterController;

class GuestController extends MasterController
{
    protected $show_view = 'admin.guest.index';
    protected $create_view = 'admin.guest.form';
    protected $edit_view = 'admin.guest.form';
    protected $route_bind_model = 'guest'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'guest.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];

    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(Guest::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {
        if(!$model) {
            $model = new Guest();
        }
        return $this->saveHandler($model);
    }
}
