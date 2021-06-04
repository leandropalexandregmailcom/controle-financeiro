<?php

namespace App\Factory;

use App\Models\User;
use App\Classes\Usuario;

class UsuarioDao
{

    public function criar(Usuario $usuario)
    {
        $create = array(
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
            'date_of_birth' => $request->date_of_birth,
            'type'          => $request->type,
            'status'        => 1
        );

        User::create($create);
    }

    public function editar(Usuario $usuario)
    {
        $user = User::where(['id' => $request->id])->first();
    }

    public function atualizar(Usuario $usuario)
    {
        $update = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'date_of_birth'  => $request->date_of_birth,
            'type'           => $request->type,
        );

        User::where(['id' => $request->id])->update($update);
    }


    public function deletar(Usuario $usuario)
    {
        User::where(['id' => $request->id])->update(['status' => 0]);
    }

}

