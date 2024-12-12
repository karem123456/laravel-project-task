@extends('layout/nav')
@section('title' , 'home')
@section('content')
    <div class="p-5 text-end">
        <a href="{{route('task.add')}}" class="btn btn-primary fs-6 rounded-pill me-5" style="width: 200px">Add Task</a>
    </div>
    <div class="p-3 mx-auto mb-3 bg-danger rounded-pill w-75 text-center"><span class="text-white fs-5">Important Task</span></div>
    @auth
        @foreach ($important as $task)
            <div class="p-3 mx-auto mb-2 bg-secondary rounded-pill w-50 d-flex justify-content-around">
                <span class="text-white">{{$task->title}}</span>
                <span class="text-white" style="font-size: 13px">{{$task->time}}</span>
                <form action="{{route('task.delete' , $task->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger p-0 m-0">
                </form>
            </div>
        @endforeach
    @endauth

    <div class="p-3 mx-auto mb-3 bg-info rounded-pill w-75 text-center"><span class="text-black fs-5">Middle Important Task</span></div>
    @auth
        @foreach ($middle_important as $task)
            <div class="p-3 mx-auto mb-2 bg-secondary rounded-pill w-50 d-flex justify-content-around">
                <span class="text-white">{{$task->title}}</span>
                <span class="text-white" style="font-size: 13px">{{$task->time}}</span>
                <form action="{{route('task.delete' , $task->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger p-1 m-0">
                </form>
            </div>
        @endforeach
    @endauth
    
    <div class="p-3 mx-auto mb-3 bg-warning rounded-pill w-75 text-center"><span class="text-black fs-5">Not Important Task</span></div>
    @auth
        @foreach ($not_important as $task)
            <div class="p-3 mx-auto mb-2 bg-secondary rounded-pill w-50 d-flex justify-content-around">
                <span class="text-white">{{$task->title}}</span>
                <span class="text-white" style="font-size: 13px">{{$task->time}}</span>
                <form action="{{route('task.delete' , $task->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger p-0 m-0">
                </form>
            </div>
        @endforeach
    @endauth
    
    @endsection