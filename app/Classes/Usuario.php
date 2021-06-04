<?php

namespace App\Classes;

use App\Interfaces\UsuarioInterface;
use Illuminate\Support\Facades\Auth;

class Usuario{

    private $email;
    private $password;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

