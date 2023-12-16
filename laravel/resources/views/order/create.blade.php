@extends('base.base')

@section('content')
    <h1>Add Order</h1>
    <div class="row">
        <div class="col-md-5">
            <form action="{{url('order/create')}}" method="POST">
                @csrf

                <div class="form-group mt-2">
                    <label for="customer_id">Select Customer</label>
                    <select name="customer_id" id="customer_id" class="form-select">
                        <option selected disabled hidden="true">Customer name</option>
                        @foreach ($customers as $customerId => $customer)
                            <option value="{{$customer->id}}">{{$customer->fullname}}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="vehicle_id">Select Vehicle</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select">
                        <option selected disabled hidden="true">Vehicle ID to order</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" aria-placeholder="refer to vehicle page">
                                {{ $vehicle->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" min='1' max="5" class="form-control" value="1">
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        Add Order
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection