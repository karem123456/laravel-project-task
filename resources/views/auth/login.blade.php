@extends('layout/nav')
@section('title' , 'login')
@section('content')

@if ($errors->any())
<div class="alert alert-danger m-3 p-2">
    @foreach ($errors->all() as $error)
        <ul>
            <li>{{$error}}</li>
        </ul>
    @endforeach
</div>
@endif

<div class="container mt-5 p-4 bg-body-tertiary rounded">
    <h2 class="text-center mb-4">Log In</h2>
    <form method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{old('email')}}" type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-50 my-4">Log In</button>
        </div>
    </form>
</div>

@endsection