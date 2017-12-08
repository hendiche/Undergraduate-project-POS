<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends MasterController
{
    protected $show_view = 'admin.user.index';
    protected $create_view = 'admin.user.form';
    protected $edit_view = 'admin.user.form';
    protected $route_bind_model = 'user'; //Route Model Binding name in RouteServiceProvider
    protected $redirect_when_success = 'user.index'; //Route Name
    protected $datatable_buttons = [
        'edit',
        'delete'
    ];


    public function dataTable($model = null)
    {
        $builder = $this->prepareDataTable(User::class);
        return $this->dataTableMaker($builder);
    }

    public function save($model = null)
    {   

        $request = $this->getRequest();
        $validator = $this->rulesOnCreate($request)->validate();

        if (!$model) {
            $model = new User();
        }
        
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->address = $request->address;

        
        $model->password = bcrypt($request->password);

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        $role = Role::find($request->roles);
        $model->assignRole($role->name);

        return $this->sendSuccessResponse();
    }

    public function update($model)
    {
        $request = $this->getRequest();
        $validator = $this->rulesOnUpdate($request)->validate();
        
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->address = $request->address;

        
        if ($request->password != null) {
            $validator = $this->passwordRulesOnUpdate($request)->validate();
            $model->password = bcrypt($request->password);
        }
       

        if (!$model->save()) {
            return $this->sendErrorResponse($model->errors());
        }
        $role = Role::find($request->roles);
        $model->syncRoles($role->name);

        return $this->sendSuccessResponse();
    }


    public function rulesOnCreate($input)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
            'confirm_new_password' => 'required_with:password|same:password'
        ];

        $message = [
            'password.required' => 'Password is required',
            'confirm_new_password.required' => 'Confirm password is required',
            'confirm_new_password.same' => 'Please check your password confirmation'
        ];

        return Validator::make($input->all(), $rules, $message);
    }

    public function rulesOnUpdate($input)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ];

        return Validator::make($input->all(), $rules);
    }

    public function passwordRulesOnUpdate($input)
    {
        $rules = [
            'password' => 'required|min:6',
            'confirm_new_password' => 'required_with:password|same:password'
        ];

        $message = [
            'new_password.required' => 'New password is required',
            'confirm_new_password.required' => 'Confirmation password is required',
            'confirm_new_password.same' => 'Please check your password confirmation'
        ];

        return Validator::make($input->all(), $rules, $message);
    }
}
