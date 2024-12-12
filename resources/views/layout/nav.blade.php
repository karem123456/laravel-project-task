<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'known page')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-relative">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Task</a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link {{Request::is('/') ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::is('about') ? 'active' : ''}}" href="{{route('about')}}">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Request::is('contact') ? 'active' : ''}}" href="{{route('contact')}}">Contact</a>
              </li>
              <div class="position-absolute end-0 d-flex mx-5">
                @auth
                <li class="btn btn-danger nav-item mx-3">
                  <a class="nav-link p-0 text-white" href="{{route('logout')}}">Logout</a>
                </li>
                <li class="nav-item">
                  <span class="nav-link active mx-2">{{auth()->user()->name}}</span>
                </li>
                @endauth
                @guest
                <li class="btn btn-secondary nav-item mx-2">
                  <a class="nav-link p-0 text-white" href="{{route('login')}}">Login</a>
                </li>
                <li class="btn btn-secondary nav-item mx-2">
                  <a class="nav-link p-0 text-white" href="{{route('signin')}}">Signin</a>
                </li>
                @endguest
              </div>
            </ul>
          </div>
        </div>
      </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>