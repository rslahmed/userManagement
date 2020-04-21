<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function index(Role $role){
        return view('roles.all_roles', compact('role'));
    }

    function add(){
        return view('roles.add_role');
    }

    function view(Role $role){
        return view('roles.view_role', compact('role'));
    }

    function store(Role $role){
        $data = $this->validateRole();
        $role->create($data);
        return redirect(route('role.all'))->with('success', 'New Roles added');
    }

    function edit(Role $role){
        if($role->id == 1){
            return back()->with('warning', 'Super Admin is not editable');
        }
        return view('roles.edit_role', compact('role'));
    }

    function update(Role $role){
        $data = $this->validateRole();
        $role->update($data);
        return redirect(route('role.all'))->with('success', 'Role has been updated');
    }

    function destroy(Role $role){
        if($role->id == 1){
            return back()->with('warning', 'Super Admin is not deletable');
        }
        $role->delete();
        return redirect(route('role.all'))->with('success', 'The Role has been deleted');
    }

    protected function validateRole(){
        return request()->validate([
            'name' => 'required|string|min:3|max:12',
            'activity_log' => 'required|integer',
            'activity_delete' => 'required|integer',
            'user_access' => 'required|integer',
            'user_add' => 'required|integer',
            'user_edit' => 'required|integer',
            'user_delete' => 'required|integer',
            'role_access' => 'required|integer',
            'role_add' => 'required|integer',
            'role_edit' => 'required|integer',
            'role_delete' => 'required|integer',
            'setting_access' => 'required|integer',
        ]);

    }
}
