<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Mail\NewCarEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            session()->flash('error', 'Debes iniciar sesión para acceder a esta página.');
            return redirect()->route('home');
        }

        $cars = Car::where('active', 1)->get();
        return view('cars.index', compact('cars'));
    }


    public function create(Request $request)
    {
        $users = User::where('active', 1)->get();
        if (isset($request->error)){
            $error = $request->error;
            session()->flash('error', 'Debes completar todos los campos.');
            return view('cars.create', compact('error'));
        }
        return view('cars.create', compact('users'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
            //dd(request()->name, request()->all());
            $type = 'create';
            $car = Car::create([
                'brand' => $request->brand,
                'model' => $request->model,
                'license_plate' => $request->license_plate,
                'owner' => $request->owner
            ]);

            Mail::to(Auth::user()->email)->send(new NewCarEmail($car, $type));

        DB::commit();

        session()->flash('success', 'Coche creado correctamente.');
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
        session()->flash('info', 'Coche actualizado correctamente.');
        return redirect()->route('cars.index');
    }


    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->active = 0;
        $car->save();

        session()->flash('success', 'Coche eliminado correctamente.');
        return redirect()->route('cars.index');
    }
}
