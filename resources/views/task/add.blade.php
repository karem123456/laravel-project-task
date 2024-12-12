@extends('layout/nav')
@section('title' , 'Add Task')
@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
    @endif

    <div class="container p-4 mt-4 bg-body-tertiary rounded">
        <h2 class="text-center mb-4">Add Task</h2>
        <form  action = "{{route('task.add.insert')}}"method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value = "{{old('title')}}" type="text" name="title" class="form-control" id="title" placeholder="Enter Your Task">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input value = "{{old('time')}}" type="text" name="time" class="form-control" id="time" placeholder="Enter Time To Your Task">
            </div>
            <div class="mb-3">
                <label class="form-label">Importance</label>
                <select name="importance" class="form-select">
                    <option value="1" selected>Important</option>
                    <option value="2">Middle Important</option>
                    <option value="3">Not Important</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary w-50 my-4">Create</button>
            </div>
        </form>
    </div>
@endsection