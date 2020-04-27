<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function index(){
        if(!auth()->user()->role || auth()->user()->role->role_access != 1){
            return back()->with('error', "sorry, you don't have access");
        }
        $role = Role::paginate(10);
        return view('roles.all_roles', compact('role'));
    }

    function add(){
        if(!auth()->user()->role || auth()->user()->role->role_add != 1){
            return back()->with('error', "sorry, you don't have access");
        }
        return view('roles.add_role');
    }

    function view(Role $role){
        if(!auth()->user()->role || auth()->user()->role->role_access != 1){
            return back()->with('error', "sorry, you don't have access");
        }
        return view('roles.view_role', compact('role'));
    }

    function store(Role $role){
        $data = $this->validateRole();
        $create = $role->create($data);
        if($create){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'created',
                'event_target' => 'role',
            ]);
        }
        return redirect(route('role.all'))->with('success', 'New Roles added');
    }

    function edit(Role $role){
        if(!auth()->user()->role || auth()->user()->role->role_edit != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        if($role->id == 1){
            return back()->with('warning', 'Super Admin is not editable');
        }
        return view('roles.edit_role', compact('role'));
    }

    function update(Role $role){
        $data = $this->validateRole();
        $update = $role->update($data);
        if($update){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'updated',
                'event_target' => 'role',
            ]);
        }
        return redirect(route('role.all'))->with('success', 'Role has been updated');
    }

    function destroy(Role $role){
        if(!auth()->user()->role || auth()->user()->role->role_delete != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        if($role->id == 1){
            return back()->with('warning', 'Super Admin is not deletable');
        }
        $delete = $role->delete();
        if($delete){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'deleted',
                'event_target' => 'role',
            ]);
        }
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
