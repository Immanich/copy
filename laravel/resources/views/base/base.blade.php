<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Distributor</title>
    <!-- {{-- <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet"> --}} -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
    </style>
<body>
  <nav class="navbar navbar-light p-3" style="background-color: rgba(108, 117, 125, 0.7)">
  <!-- {{-- <nav class="navbar navbar-light mb-5 p-3" style="background-color: #e3f2fd"> --}} -->
    <h1 class="fs-1" style="font-weight: 400; font-family:'Courier New', Courier, monospace">CAR DISTRIBUTOR</h1>
    <ul class="nav justify-content-end float-right nav-pills">
      <li class="nav-item">
        <a style="color: #212529;" class="fs-5 nav-link {{Route::is('home') ? 'active' : ''}}" href="{{ url('/') }}">HOME</a>
      </li>
      <li class="nav-item">
        <a style="color: #212529;" class="fs-5 nav-link {{Route::is('customer') ? 'active' : ''}}" href="{{ url('/customer')}}">CUSTOMER</a>
      </li>
      <li class="nav-item">
        <a style="color: #212529;" class="fs-5 nav-link {{Route::is('order') ? 'active' : ''}}" href="{{ url('/order') }}">ORDER</a>
      </li>
      <li class="nav-item">
        <a style="color: #212529;" class="fs-5 nav-link {{Route::is('vehicle') ? 'active' : ''}}" href="{{ url('/vehicle') }}">VEHICLE</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link {{Route::is('trainees') ? 'active' : ''}}" href="{{ url('/trainees') }}">TRAINEES</a>
      </li> -->
    </ul>
  </nav>

  <div class="main-container bg-secondary-subtle">
    <div class="container pt-5" style="height: 86.5vh">
      @yield('content')
    </div>
</div>
</body>
</html>