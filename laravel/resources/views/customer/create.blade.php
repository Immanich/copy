@extends('base.base')

@section('content')
<h1>Create User</h1>
<div class="row">
    <div class="col-md-5">
        <form action="{{url('customer/create')}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="fullname">Name</label>
                <input type="text" name="fullname" class="form-control" placeholder="Enter your name" autocomplete>
                @error('fullname')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" autocomplete>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="address">Address</label>
                <input type="address" name="address" class="form-control" placeholder="Enter your address" autocomplete>
                @error('address')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" name="phoneNumber" class="form-control" patterm="[0-9]{11}" placeholder="Enter 11 digits" autocomplete>
                @error('phoneNumber')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-primary" type="submit">
                    Add Customer
                </button>
            </div>
        </form>
    </div>
  </div>
@endsection