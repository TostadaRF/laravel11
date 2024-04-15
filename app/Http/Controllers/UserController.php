<?php

namespace App\Http\Controllers;

use Error;
use App\Models\User;
use App\Mail\NewUserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        DB::beginTransaction();

            if($request->pass == $request->pass_check){
                $auth_code = strval(rand(1000, 9999));

                $user = User::create([
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'dni' => $request->dni,
                    'email' => $request->email,
                    'password' => $request->pass,
                    'auth_code' => $auth_code,
                ]);

                Mail::to($user->email)->send(new NewUserEmail($user, $auth_code));

        DB::commit();

            session()->flash('success', 'Usuario creado correctamente.');
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
                $user->password = $request->pass;
            } else {
                return redirect()->route('users.edit', $id);
            }
        }
        $user->save();
        session()->flash('info', 'Usuario actualizado correctamente.');
        return redirect()->route('users.index');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->active = 0;
        $user->save();
        session()->flash('success', 'Usuario eliminado correctamente.');
        return redirect()->route('users.index');
    }

    public function verification()
    {
        return view('users.verification');
    }

    public function verify(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user){
            if($user->auth_code == $request->auth_code){
                $user->verified = 1;
                $user->save();
                session()->flash('success', 'Usuario verificado correctamente.');
                return redirect()->route('login');
            } else {
                session()->flash('error', 'Código de verificación incorrecto.');
                return redirect()->route('users.verification');
            }
        } else {
            session()->flash('error', 'Usuario no encontrado.');
            return redirect()->route('users.verification');
        }
    }
}
