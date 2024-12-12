<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){

        request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);
        
        if(Auth::attempt(['email' => request()->email , 'password' => request()->password])){

            $user = User::where('email' , request()->email)->first();
            Auth::login($user);
            return redirect()->route('home');
        }else{
            return back()->withErrors('this account not found');
        }
    }

    public function signin(){

        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'cpassword' => 'same:password'
        ]);
        
        $exist = User::where('email' , request()->email)->get();

        if($exist){
            return back()->withErrors('this email is already exist');
        }else{
            $user = User::create([
                'name' => request()->name ,
                'email' => request()->email ,
                'password' => request()->password ,
            ]);
            Auth::login($user);
            return redirect()->route('home');
        }

    }

    public function logout(){

        Auth::logout();
        return redirect()->route('home');
    }
}
