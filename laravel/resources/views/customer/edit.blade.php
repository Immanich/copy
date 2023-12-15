@extends('base.base')

@section('content')

<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUserModalLabel">
                    Delete Customer - {{$customer->id}} ?
                </h1>
                <button class="btn-close" type="button"  data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('customer/delete/' . $customer->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                Are you sure you want to delete this customer?
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  type="submit" class="btn btn-danger">Delete User</button>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-5">
        <form action="{{url('customer/'.$customer->id)}}" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="fullname">Name</label>
                <input type="text" name="fullname" class="form-control" value="{{$customer->fullname}}">
                @error('fullname')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{$customer->email}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="{{$customer->address}}">
                @error('address')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
                <label for="phoneNumber">Phone Number</label>
                <input type="text" name="phoneNumber" class="form-control" value="{{$customer->phoneNumber}}">
                @error('phoneNumber')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mt-2 d-grid gap-2 d-md-flex justify-content-end">
                
                <button class="btn btn-primary" type="submit">
                    Update Customer
                </button>
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                    Delete Customer
                </button>
            </div>
        </form>
    </div>
  </div>
@endsection