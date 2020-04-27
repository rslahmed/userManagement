<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function index(){
        $activity = Activity::latest()->paginate(10);
        return view('activity.all_activity', compact('activity'));
    }

    function destroy(Activity $activity){
        if(!auth()->user()->role && !auth()->user()->role->activity_delete == 1){
            return back()->with('error', "sorry, you don't have access");
        }
        $delete = $activity->delete();
        if($delete){
            Activity::create([
                'user_name' => auth()->user()->name,
                'event_name' => 'deleted',
                'event_target' => 'record',
            ]);
        }
        return back()->with('success', 'Log has been deleted');
    }
}
