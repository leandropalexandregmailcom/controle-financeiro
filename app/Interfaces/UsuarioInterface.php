<?php

namespace App\Interfaces;

use App\Classes\Usuario;

interface UsuarioInterface{

    public function login(Usuario $usuario);

    public function logout();
}

