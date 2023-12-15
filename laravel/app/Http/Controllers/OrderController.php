<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Vehicle;
class OrderController extends Controller
{
    public function index() {
        $orders = Order::orderBy('id') -> get();

        return view('order.index', ['orders' => $orders]);
    }

    public function create()
    {
    $customers = Customer::orderBy('id')->get();
    $vehicles = Vehicle::select('id')->distinct()->orderBy('id')->get();

    return view('order.create', ['customers' => $customers, 'vehicles' => $vehicles]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'customer_id'   => 'required|numeric',
            'vehicle_id'   => 'required|numeric',
            'quantity'   => 'required|integer|min:1',
        ]);
        
        Order::create([
            'customer_id'   => $request->input('customer_id'),
            'vehicle_id'   => $request->input('vehicle_id'),
            'quantity'   => $request->input('quantity'),
            'total_amount' => $request->input('quantity') * $request->input('vehicle.price'),
        ]);

        return redirect('/order')->with('message', 'Your order is in queue.');
    }

    public function edit(Order $order)
{
    $order = $order->load('vehicle');
    $order = $order->load('customer');

    $customers = Customer::all();
    $vehicles = Vehicle::all();

    return view('order.edit', compact('order', 'vehicles', 'customers'));
}



    public function update(Order $order, Request $request)
    {
        $request->validate([
            'customer_id'   => 'required|numeric',
            'vehicle_id'   => 'required|numeric',
            'quantity'   => 'required|integer|min:1',
        ]);

        $order->update([
            'customer_id' => $request->input('customer_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'quantity' => $request->input('quantity'),
            'total_amount' => $request->input('quantity') * $request->input('vehicle_price'),
        ]);

        return redirect('/order')->with('message', "Order with an ID of $order->id has been updated.");
    }

    public function delete(Order $order) {
        $order->delete();
        
        return redirect('/order')->with('message', "Order with an ID of $order->id has been deleted successfully.");
    }
}
