<?php

namespace App\Http\Controllers;

use App\Classes\Usuario;
use Illuminate\Http\Request;
use App\Factory\UsuarioFactory;

class LoginController extends Controller
{
    public function login()
    {
        return view('login/login');
    }

    public function logar(Request $request, Usuario $Usuario, UsuarioFactory $UsuarioFactory)
    {
        $Usuario->setEmail($request->email);
        $Usuario->setPassword($request->password);

        $UsuarioFactory->login($Usuario);
    }
}
