<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    .p-3 {
        background-color:#EA738DFF;

    }

</style>
<body>
    <header class="p-3 text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/index" class="nav-link px-2 text-secondary">Home</a></li>
              @if (Auth::check())

              @if(Auth::user()->user_type == 'admin')
              <li><a href="/Dashboard/User/Show" class="nav-link px-2 text-white">Dashboard</a></li>

              @endif
              @endif
              @if (Auth::check())

              @if(Auth::user()->user_type == 'professor')
              <li><a href="/uploadpage" class="nav-link px-2 text-white">Upload File</a></li>

              @endif
              @endif

              <li><a href="/professor" class="nav-link px-2 text-white">Professors</a></li>

              @auth
              <li><a href="/profile" class="nav-link px-2 text-white">Profile</a></li>
              @endauth
              <li><a href="/about" class="nav-link px-2 text-white">About</a></li>

              <li><a href="/Contact/Create" class="nav-link px-2 text-white">Contact Us</a></li>

            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 " action="{{url('file/search')}}"  method="GET" id="search">
                @csrf
              <input type="search" class="form-control form-control-dark" placeholder="Search..."
              name="search" id="search">
            </form>

            @auth
            <div class="outline-light me-2"">
             Welcome {{auth()->user()->username}}
            </div>
              <div class="text-end">
                <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
              </div>
            @endauth

            @guest
              <div class="text-end">
                <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
              </div>
            @endguest
          </div>
        </div>
      </header>

</body>
</html>
