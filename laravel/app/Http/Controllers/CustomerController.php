<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::orderBy('id') -> get();

        return view('customer.index', ['customers' => $customers]);
    }

    public function create()
    {
        $customers = Customer::orderBy('id') -> get();

        return view('customer.create', ['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request -> validate([
            'fullname'   => 'required|string',
            'email'   => 'required|email',
            'address'   => 'required|string',
            'phoneNumber'   => 'required|numeric',
        ]);
        
        Customer::create([
            'fullname'   => $request->fullname,
            'email'   => $request->email,
            'address'   => $request->address,
            'phoneNumber'   => $request->phoneNumber
        ]);

        return redirect('/customer')->with('message', 'A new customer has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $request->validate([
            'fullname'   => 'required|string',
            'email'   => 'required|email',
            'address'   => 'required|string',
            'phoneNumber'   => 'required|numeric',
        ]);

        $customer->update($request->all());
        return redirect('/customer')->with('message', "Customer with an ID of $customer->id has been updated.");
    }

    public function delete(Customer $customer) {
    $customer->orders()->delete();

    $customer->delete();

    return redirect('/customer')->with('message', "Customer with an ID of $customer->id has been deleted successfully.");
}

}
