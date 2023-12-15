@extends('base.base')

@section('content')

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">
                    Delete Vehicle - {{$vehicle->id}} ?
                </h1>
                <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('vehicle/delete/' . $vehicle->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this vehicle?
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-danger">Delete Vehicle</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-5">
        <form action="{{url('vehicle/'.$vehicle->id)}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="make">Make</label>
                <input type="text" name="make" id="make" class="form-control" value="{{$vehicle->make}}" placeholder="company name">
                @error('make')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control" value="{{$vehicle->model}}" placeholder="model of the car">
                @error('model')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="year">Year</label>
                <select name="year" id="year" class="form-select">
                
                    <option hidden = "true" value="{{$vehicle->year}}" selected disabled>{{$vehicle->year}}</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                </select>
                @error('make')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="color">Color</label>
                <select name="color" id="color" class="form-select">
                    <option value="{{$vehicle->color}}" hidden = "true" selected >{{$vehicle->color}}</option>
                    <option value="Super White">Super White</option>
                    <option value="Emotional Red">Emotional Red</option>
                    <option value="Attitude Black Mica">Attitude Black Mica</option>
                    <option value="Navy Blue">Navy Blue</option>
                </select>
                @error('make')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <p class="mb-0">Transmission</p>
                <label for="transmission">
                    <input type="radio" name="transmission" id="transmission" value="{{$vehicle->transmission}}" checked disabled>{{$vehicle->transmission}}
                </label>
            </div>
            <div class="form-group mt-2">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" min="1" step="any" class="form-control" value="{{$vehicle->price}}" placeholder="minimum of 5 digits and 2 decimals"/>
                @error('price')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                
                <button class="btn btn-primary" type="submit">
                    Update Vehicle
                </button>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Delete Vehicle
                </button>
            </div>
        </form>
    </div>
  </div>
@endsection