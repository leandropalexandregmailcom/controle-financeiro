<?php

namespace App\Http\Controllers;

use App\Classes\Usuario;
use Illuminate\Http\Request;
use App\Factory\UsuarioFactory;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;

class LoginController extends Controller
{
    public function login()
    {
        return view('login/login');
    }

    public function logar(LoginUserRequest $request, Usuario $Usuario, UsuarioFactory $UsuarioFactory)
    {
        $Usuario->setEmail($request->email);
        $Usuario->setPassword($request->password);

        return redirect()->route($UsuarioFactory->login($Usuario));
    }

    public function logout()
    {
        Auth::logout();
        return true;
    }
}
