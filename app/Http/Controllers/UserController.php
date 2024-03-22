<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('active', 1)->get();
        //%User = User::where('name', 'Alberto')->get();
        return view('users.index', compact('users'));
    }


    public function create(Request $request)
    {
        if (isset($request->error)){
            $error = $request->error;
            return view('users.create', compact('error'));
        }
        return view('users.create');
    }


    public function store(Request $request)
    {
        //dd(request()->name, request()->all());

        if($request->pass == $request->pass_check){
            User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'dni' => $request->dni,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
            ]);

            return redirect()->route('users.index');
        } else {
            $error = 'Las contraseñas no coinciden';
            return redirect()->route('users.create', ['error' => $error]);
        }
    }


    public function show(string $id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->dni = $request->dni;
        $user->email = $request->email;

        if($request->pass){
            if($request->pass == $request->pass_check){
                $user->password = Hash::make($request->pass);
            } else {
                return redirect()->route('users.edit', $id);
            }
        }
        $user->save();

        return redirect()->route('users.index');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();

        return redirect()->route('users.index');
    }
}
