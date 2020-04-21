<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user){
        return view('users.all_user', compact('user'));
    }

    public function view(User $user){
        return view('users.single_user', compact('user'));
    }

    public function delete(User $user){
        if($user->id == 1){
            return back()->with('warning', 'Super Admin is not deletable');
        }
        $user->delete();
        return back()->with('success', 'User has been deleted');
    }

    public function restore($id){
        User::onlyTrashed()->where('id', $id)->restore();
        return back()->with('success', 'User has been restored');
    }

    public function destroy($id){
        User::onlyTrashed()->where('id', $id)->forceDelete();
        return back()->with('success', 'User has been permanently deleted');
    }

    public function trash(){
        $user = User::onlyTrashed()->get();
        return view('users.user_trash', compact('user'));
    }

    public function edit(User $user){
        if($user->id == 1){
            return back()->with('warning', 'Super Admin is not editable');
        }
        return view('users.edit_user', compact('user'));
    }

    public function update(User $user){

    }
}
