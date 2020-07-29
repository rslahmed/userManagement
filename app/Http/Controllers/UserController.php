<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if(!auth()->user()->role || auth()->user()->role->user_access != 1){
            return back()->with('error', "sorry, you don't have access");
        }
        $user = User::paginate(10);
        return view('users.all_user', compact('user'));
    }

    public function view(User $user){
        if(!auth()->user()->role || auth()->user()->role->user_access != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        return view('users.single_user', compact('user'));
    }

    public function delete(User $user){
        if(!auth()->user()->role || auth()->user()->role->user_delete != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        if($user->id == 1){
            return back()->with('warning', 'Super Admin is not deletable');
        }

        if($user->id == 1){
            return back()->with('warning', 'Super Admin is not deletable');
        }
        $delete = $user->delete();
        if($delete){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'deleted',
                'event_target' => 'user',
            ]);
        }
        return redirect(route('user.all'))->with('success', 'User has been deleted');
    }

    public function restore($id){
        if(!auth()->user()->role || auth()->user()->role->user_delete != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        $restore = User::onlyTrashed()->where('id', $id)->restore();
        if($restore){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'restored',
                'event_target' => 'user',
            ]);
        }
        return back()->with('success', 'User has been restored');
    }

    public function destroy($id){
        if(!auth()->user()->role || auth()->user()->role->user_delete != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        $delete = User::onlyTrashed()->where('id', $id)->forceDelete();
        if($delete){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'permanently deleted',
                'event_target' => 'user',
            ]);
        }
        return back()->with('success', 'User has been permanently deleted');
    }

    public function trash(){
        if(!auth()->user()->role || auth()->user()->role->user_delete != 1){
            return back()->with('error', "sorry, you don't have access");
        }

        $user = User::onlyTrashed()->get();
        return view('users.user_trash', compact('user'));
    }

    public function edit(User $user, Role $role){
        if(!auth()->user()->role || auth()->user()->role->user_edit != 1){
            return back()->with('error', "sorry, you don't have access");
        }

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

        $update = $user->update($data);

        if($update){
            Activity::create([
               'user_name' => auth()->user()->name,
               'event_name' => 'updated',
               'event_target' => 'user',
            ]);
        }
        return redirect(route('user.all'))->with('success', 'User has been updated');
    }

    function updatePassword(User $user){
        request()->validate([
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        if(Hash::check(request()->old_password, $user->password)){

            $update = $user->update([
                'password' => Hash::make(request()->password)
            ]);

            if($update){
                Activity::create([
                    'user_name' => auth()->user()->name,
                    'event_name' => 'changed',
                    'event_target' => 'user password',
                ]);
            }
            return redirect(route('user.all'))->with('success', 'Your password has changed');
        }
        else{
            return back()->with('error', 'Your credential is not matched');
        }

    }

    function storeImage(User $user){
        // create image
        request()->validate([
            'image' => 'required'
        ]);
        $image = base64_decode(request()->image);
        $imageName ='/uploads/'.uniqid().time().'.jpg';

        $update = $user->update([
           'image' => $imageName
        ]);

        if($update){
            file_put_contents( public_path().$imageName, $image);
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'updated',
                'event_target' => 'user image',
            ]);
            return back()->with('success', 'Image has been updated');
        }else{
            return back()->with('error', 'Something went wrong, please try again');
        }
    }
}
