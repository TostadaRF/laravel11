<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        $user = User::where('active', 1)->where('email', $request->email)->where('password', $request->password)->first();

        if(!isset($user)){
            session()->flash('error', 'Usuario o contraseña incorrectos.');
            return false;
        }

        if($user->verified == 0){
            session()->flash('error', 'Usuario no verificado.');
            return false;
        }

        Auth::login($user);
        session()->flash('success', 'Bienvenido, '.$user->name.'.');
        return true;
    }

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
