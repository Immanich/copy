@extends('base.base')

@section('content')
@if (session('message'))
  <div class="alert alert-success">{{session('message')}}</div>
@endif

<div class="d-grid grap-2 d-md-flex justify-content-end mb-3">
  <a href="{{url('/order/create')}}" class="btn btn-primary mo-md-2" type="button">
    Add Order 
  </a>
</div>
    <table class="table table-bordered table-striped table">
      <thead>
        <tr>
            <th>ID</th>
            <th>Customer ID</th>
            <th>Vehicle ID</th>
            <th>Customer's Name</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Transmission</th>
            <!-- <th>Vehicle ID</th> -->
            <!-- <th>Vehicle Make</th> -->
            <th>Quantity</th>
            <th>Total Amount</th>
            <th style="text-align: center;">MODIFY</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->customer->id}}</td>
                        <td>{{$order->vehicle->id}}</td>
                        <td>{{$order->customer->fullname}}</td>
                        <td>{{$order->vehicle->make}}</td>
                        <td>{{$order->vehicle->model}}</td>
                        <td>{{$order->vehicle->year}}</td>
                        <td>{{$order->vehicle->transmission}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{ '₱' . number_format($order->vehicle->price * $order->quantity, 2) }}</td>
                        <td class="text-center">
                          <a href="{{url('/order/'.$order->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                          </svg></a>
                        </td>
                    </tr>
                @endforeach
      </tbody>
    </table>
  </div>
@endsection