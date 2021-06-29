<?php

namespace App\Factory;

use App\Dao\ClienteDao;
use App\Classes\Usuario;
use App\Dao\AdministradorDao;
use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Auth;

class UsuarioFactory implements UsuarioInterface
{
    private $email;
    private $password;

    function __construct(Usuario $usuario)
    {
        $this->email = $usuario->getEmail();
        $this->password = $usuario->getPassword();
    }

    public function login(Usuario $usuario)
    {
        $credentials['email'] = $usuario->getEmail();
        $credentials['password'] = $usuario->getPassword();

        $route = 'home.user';
        if (Auth::attempt($credentials)) {

            return $route;
        }

        $route = 'login';
        return $route;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function criar(Usuario $usuario)
    {
        if($usuario->getType() == 'administrador')
        {
            $admin = new AdministradorDao();
            $admin->criar($usuario);
        }

        if($usuario->getType() == 'cliente')
        {
            $cliente = new ClienteDao();
            $cliente->criar($usuario);
        }

        return true;
    }

    public function atualizar(Usuario $usuario)
    {
        if($usuario->getType() == 'administrador')
        {
            $admin = new AdministradorDao();
            $admin->atualizar($usuario);
        }

        if($usuario->getType() == 'cliente')
        {
            $cliente = new ClienteDao();
            $cliente->atualizar($usuario);
        }

        return true;
    }


}

