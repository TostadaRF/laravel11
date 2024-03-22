<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('active', 1)->get();
        return view('cars.index', compact('cars'));
    }


    public function create(Request $request)
    {
        $users = User::where('active', 1)->get();
        if (isset($request->error)){
            $error = $request->error;
            return view('cars.create', compact('error'));
        }
        return view('cars.create', compact('users'));
    }


    public function store(Request $request)
    {
        //dd(request()->name, request()->all());
        Car::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'license_plate' => $request->license_plate,
            'owner' => $request->owner
        ]);
        return redirect()->route('cars.index');
    }


    public function show(string $id)
    {
        $car = Car::find($id);
        return view('cars.show', compact('car'));
    }


    public function edit(string $id)
    {
        $car = Car::find($id);
        $users = User::where('active', 1)->get();
        return view('cars.edit', compact('car', 'users'));
    }


    public function update(Request $request, string $id)
    {
        $car = Car::find($id);
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->license_plate = $request->license_plate;
        $car->owner = $request->owner;

        $car->save();

        return redirect()->route('cars.index');
    }


    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->active = 0;
        $car->save();

        return redirect()->route('cars.index');
    }
}
