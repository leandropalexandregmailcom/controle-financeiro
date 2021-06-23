<?php

namespace App\Dao;

use App\Models\User;
use App\Classes\Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClienteDao
{
    use HasFactory;


    public function criar(Usuario $usuario)
    {
        $create = array(
            'name'          => $usuario->getName(),
            'email'         => $usuario->getEmail(),
            'password'      => $usuario->getPassword(),
            'date_of_birth' => $usuario->getDate_of_birth(),
            'type'          => $usuario->getType(),
        );
        User::create($create);

        return true;
    }

    public function atualizar(Usuario $usuario)
    {
          $update = array(
            'name'          => $usuario->getName(),
            'email'         => $usuario->getEmail(),
            'date_of_birth' => $usuario->getDate_of_birth(),
            'type'          => $usuario->getType(),
        );

        User::where(['id' => $usuario->getId(), 'status' => 1])->update($update);

        return true;
    }

}
