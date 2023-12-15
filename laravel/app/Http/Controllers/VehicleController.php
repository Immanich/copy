<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index() {
        $vehicles = Vehicle::orderBy('id') -> get();

        return view('vehicle.index', ['vehicles' => $vehicles]);
    }

    public function create()
    {
        $vehicles = Vehicle::orderBy('id')->get();

        return view('vehicle.create', ['vehicles' => $vehicles]);
    }

    public function store(Request $request)
    {

        $request -> validate([
            'make'   => 'required',
            'model'   => 'required',
            'year'   => 'required|numeric',
            'color'   => 'required',
            'transmission'   => 'required',
            'price'   => 'required|min:3',
        ]);
        
        Vehicle::create([
            'make'   => $request->make,
            'model'   => $request->model,
            'year'   => $request->year,
            'color'   => $request->color,
            'transmission'   => $request->transmission,
            'price'   => $request->price
        ]);

        return redirect('/vehicle')->with('message', 'New vehicle has been added.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicle.edit', compact('vehicle'));
    }

    public function update(Vehicle $vehicle, Request $request)
    {
        $request->validate([
            'make'   => 'required',
            'model'   => 'required',
            'year'   => 'required',
            'color'   => 'required',
            // 'transmission'   => 'required',
            'price'   => 'required|numeric|min:5',
        ]);

        // $vehicle->update($request->all());
        $vehicle->update([
            'make' => $request->input('make'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'price' => $request->input('price'),
        ]);

        return redirect('/vehicle')->with('message', "Vehicle with an ID of $vehicle->id has been updated.");
    }

    public function delete(Vehicle $vehicle) {

        $vehicle->orders()->delete();
        
        $vehicle->delete();
        
        return redirect('/vehicle')->with('message', "Vehicle with an ID of $vehicle->id has been deleted successfully.");
    }
}
