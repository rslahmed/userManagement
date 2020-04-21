<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    function index(){
        return view('roles.view_roles');
    }

    function add(){
        return view('roles.add_role');
    }

    function store(Role $role, Request $request){
        return $this->roleValidate($request);
        return $request;
    }

    protected function roleValidate($request)
    {
        return $request->validate([
            // TODO add validation for roles
        ]);
    }
}
