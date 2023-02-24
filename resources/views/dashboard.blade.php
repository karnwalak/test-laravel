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
            <li class="nav-item mx-3">
              <a class="nav-link btn btn-primary text-light" aria-current="page"
                href="{{route('/logout')}}">Logout</a>
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
        <div class="col-md-10">
          <h1 class="text-center">Student Record</h1>
          <a href="{{route('student.create')}}" class="btn btn-primary my-2 float-right">Add Student</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $key => $da)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td width="10%"><img class="img-thumbnail" width="100%" src="{{url($da->image ? $da->image : 'img/ampere_logo.svg')}}" alt="" srcset=""></td>
                <td>{{$da->name}}</td>
                <td>{{$da->email}}</td>
                <td>{{$da->contact}}</td>
                <td>{{$da->address}}</td>
                <td>
                  <div class="d-flex">
                    <a href="{{route('student.edit',$da->id)}}" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{route('student.destroy',$da->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" onclick="return confirm('Are you sure!')" class="btn btn-sm btn-danger mx-2">Delete</button>
                    </form>

                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
</body>

</html>