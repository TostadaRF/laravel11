<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::where('active', 1)->get();
        return view('properties.index', compact('properties'));
    }


    public function create(Request $request)
    {
        $users = User::where('active', 1)->get();
        if (isset($request->error)){
            $error = $request->error;
            return view('properties.create', compact('error'));
        }
        return view('properties.create', compact('users'));
    }


    public function store(Request $request)
    {
        //dd(request()->name, request()->all());
        Property::create([
            'type' => $request->type,
            'has_garage' => $request->has_garage,
            'color' => $request->color,
            'owner' => $request->owner
        ]);
        session()->flash('success', 'Propiedad creada correctamente.');
        return redirect()->route('properties.index');
    }


    public function show(string $id)
    {
        $property = Property::find($id);
        return view('properties.show', compact('property'));
    }


    public function edit(string $id)
    {
        $property = Property::find($id);
        $users = User::where('active', 1)->get();
        return view('properties.edit', compact('property', 'users'));
    }


    public function update(Request $request, string $id)
    {
        $property = Property::find($id);
        $property->type = $request->type;
        $property->has_garage = $request->has_garage;
        $property->color = $request->color;
        $property->owner = $request->owner;

        $property->save();
        session()->flash('info', 'Propiedad actualizada correctamente.');
        return redirect()->route('properties.index');
    }


    public function destroy(string $id)
    {
        $property = Property::find($id);
        $property->active = 0;
        $property->save();

        session()->flash('success', 'Propiedad eliminada correctamente.');
        return redirect()->route('properties.index');
    }
}
