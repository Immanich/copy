@extends('base.base')

@section('content')
    <h1>Add Vehicle</h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{url('vehicle/create')}}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="make">Make</label>
                    <input type="text" name="make" class="form-control" placeholder="Company Name">
                    @error('make')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="model">Model</label>
                    <input type="text" name="model" class="form-control" placeholder="Vehicle Model">
                    @error('model')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="year">Year</label><br>
                    <select name="year" id="year" class="form-select">
                        <option hidden="true" selected disabled>Select Year</option>
                        @foreach ($vehicles->unique('year')->sortBy('year') as $vehicle)
                            <option value="{{$vehicle->year}}">{{$vehicle->year}}</option>
                        @endforeach
                    </select>
                    @error('year')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="color">Color</label><br>
                    <select name="color" id="color" class="form-select">
                        <option hidden="true" selected disabled>Select Color</option>
                        @foreach ($vehicles->unique('color')->sortBy('color') as $vehicle)
                            <option value="{{$vehicle->color}}">{{$vehicle->color}}</option>
                        @endforeach
                    </select>
                    @error('color')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <p class="mb-0">Transmission</p>
                    <label for="AT">
                        <input type="radio" name="transmission" id="AT" value="AT" checked>AT
                    </label>
                    <label for="MT">
                        <input type="radio" name="transmission" id="MT" value="MT">MT
                    </label>
                    @error('transmission')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" min="10000" max="1000000" step="any" class="form-control" placeholder="5 to 7 digits required"/> 
                    @error('price')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        Add Vehicle
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
