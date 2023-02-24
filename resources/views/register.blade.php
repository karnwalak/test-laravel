<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid text-light">
      <a class="navbar-brand" href="#"><img src="{{url('img/ampere_logo.svg')}}" alt="" srcset=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
        </ul>
        <span class="navbar-text">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link btn btn-primary text-light" aria-current="page" href="{{route('/')}}">Login</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-primary text-light" aria-current="page"
                href="{{route('/register')}}">Signup</a>
            </li>
          </ul>
        </span>
      </div>
    </div>
  </nav>
  <section>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-7">
          
          @if(Session::has('message'))
          <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('message')}}
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissible" role="alert">
            {{Session::get('error')}}
          </div>
          @endif
        </div>
        <div class="col-md-6">
          <h1 class="text-center">Registration Form!</h1>
          <form action="{{route('/store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp">
              <p class="text-danger">
                @error('name')
                  {{$message}}
                @enderror
              </p>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <p class="text-danger">
                @error('email')
                {{$message}}
                @enderror
              </p>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              <p class="text-danger">
                @error('password')
                {{$message}}
                @enderror
              </p>
            </div>
            <div class="mb-3">
              <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" id="exampleInputConfirmPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>