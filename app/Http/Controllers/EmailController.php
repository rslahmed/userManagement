<?php

namespace App\Http\Controllers;

use App\Mail\EmailMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    function index(){
        return view('email');
    }

    function sendEmail(Request $request){
        Mail::to(request()->email)->send(new EmailMe());
        return back();
    }
}
