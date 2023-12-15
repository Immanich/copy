@extends('base.base')

@section('content')

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">
                    Delete Order - {{$order->id}} ?
                </h1>
                <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('order/delete/' . $order->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this order?
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-danger">Delete Order</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-5">
        <form action="{{url('order/'.$order->id)}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-select" disabled>
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}" @if($customer->id == $order->customer->id) selected @endif>{{$customer->fullname}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="customer_id" value="{{$order->customer->id}}">
                @error('customer_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>



                <div class="form-group mt-2">
                    <label for="vehicle_id">Select Vehicle</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-select">
                        <!-- <option selected disabled hidden="true">Select vehicle</option> -->
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">
                                {{ $vehicle->id }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- <div class="form-group mt-2"> -->
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" min='1' max="5" class="form-control" value="1">
                    @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                
                <button class="btn btn-primary" type="submit">
                    Update Order
                </button>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Delete Order
                </button>
            </div>
        </form>
    </div>
  </div>
@endsection