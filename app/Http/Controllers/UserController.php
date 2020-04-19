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

}
