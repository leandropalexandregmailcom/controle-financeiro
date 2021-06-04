<?php

namespace App\Http\Controllers;

use App\Classes\Usuario;
use Illuminate\Http\Request;
use App\Factory\UsuarioFactory;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $Usuario = new Usuario();
        $Usuario->setEmail($request->email);
        $Usuario->setPassword($request->password);

        $UsuarioFactory = new UsuarioFactory();
        $UsuarioFactory->login($Usuario);
    }

    public function logar()
    {
        return redirect()->view('login');
    }
}
