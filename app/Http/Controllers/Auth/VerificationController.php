<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    use AuthenticatesUsers;

    public function verification()
    {
        return view('auth.verification');
    }

    protected function validateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'auth_code' => 'required|string',
        ]);
    }

    protected function attemptVerification(Request $request)
    {
        $user = User::where('active', 1)->where('email', $request->email)->where('auth_code', $request->auth_code)->first();
        dd($user);
        if(!isset($user)){
            session()->flash('error', 'Usuario o código incorrectos.');
            return false;
        }

        $user->verified = 1;
        $user->save();

        Auth::login($user);
        session()->flash('success', 'Bienvenido, '.$user->name.'. Usuario verificado con éxito.');
        return true;
    }

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
