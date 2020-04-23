<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return redirect(route('user.all'))->with('success', 'User has been deleted');
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

    public function edit(User $user, Role $role){
        if($user->id == 1){
            return back()->with('warning', 'Super Admin is not editable');
        }
        return view('users.edit_user', compact('user', 'role'));
    }

    public function update(User $user){
        $data = null;
        if(request()->task == 'profile_update'){

        }
        elseif(request()->task == 'general_update'){
            $data = request()->validate([
                'name' => ['required', 'string', 'min:3', 'max:25'],
                'role_id' => ['required', 'integer'],
                'status' => ['required', 'integer'],
            ]);

            if($user->email != request()->email){
                request()->validate([
                    'email' =>['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
                $data['email'] = request()->email;
            }
        }

        $user->update($data);
        return redirect(route('user.all'))->with('success', 'User has been updated');
    }

    function updatePassword(User $user){
        if(Hash::check(request()->old_password, $user->password)){
            request()->validate([
                'password' => ['required', 'string', 'min:3', 'confirmed'],
            ]);
            $user->update([
                'password' => Hash::make(request()->password)
            ]);
            return redirect(route('user.all'))->with('success', 'Your password has changed');
        }
        else{
            return back()->with('error', 'Your credential is not matched');
        }

    }
}
