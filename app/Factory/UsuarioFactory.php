<?php

namespace App\Factory;

use App\Classes\Usuario;
use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Auth;

class UsuarioFactory implements UsuarioInterface
{
    public function login(Usuario $usuario)
    {
        $credentials['email'] = $usuario->getEmail();
        $credentials['password'] = $usuario->getPassword();

        if (Auth::attempt($credentials)) {
            return redirect()->route(Auth::user()->type);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

