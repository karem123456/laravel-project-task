<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function home(){

        if(Auth::check()){

            $important = Task::where([['user_id' ,"=", auth()->user()->id] , ['importance' ,"=", 1]])->get();
            $middle_important = Task::where([['user_id' ,"=", auth()->user()->id] , ['importance' ,"=", 2]])->get();
            $not_important = Task::where([['user_id' ,"=", auth()->user()->id] , ['importance' ,"=", 3]])->get();
            
            return view('home' , ['important' => $important , 'middle_important' => $middle_important , 'not_important' => $not_important]);
        }

        return view('home');
    }

    public function task_add(){
        request()->validate([
            'title' => "required|min:3",
            'time' => "required",
            'importance' => "required|integer",
        ]);

        Task::create([
            'title' => request()->title,
            'time' => request()->time,
            'importance' => request()->importance,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home');
    }

    public function task_delete($id){

        Task::find($id)->delete();
        return redirect()->route('home');
    }

}
