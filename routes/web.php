<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\TaskList\TaskListExtension;

Route::get('/', [TaskController::class , 'home'])->name('home');

Route::get('/about' , function(){
    return view('about');
})->name('about');

Route::get('/contact' , function(){
    return view('contact');
})->name('contact');

// route for auth

Route::get('/login' , function(){
    return view('auth.login');
})->name('login');

Route::Post('/login' , [AuthController::class , 'login'])->name('auth.login');

Route::get('/signin' , function(){
    return view('auth.signin');
})->name('signin');

Route::Post('/signin' , [AuthController::class , 'signin'])->name('auth.signin');

Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');

// route for tasks

Route::get('/add_task' , function(){
    return view('task.add');
})->name('task.add')->middleware('auth');

Route::post('/add_task' , [TaskController::class , 'task_add'])->name('task.add.insert');

Route::delete('/delete_task/{id}' , [TaskController::class , 'task_delete'])->name('task.delete');