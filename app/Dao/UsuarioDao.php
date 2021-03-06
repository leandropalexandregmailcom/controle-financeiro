<?php

namespace App\Dao;

use App\Models\User;
use App\Classes\Usuario;

class UsuarioDao
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function listar()
    {
        return $this->model->where(['status' => 1])->paginate(10);
    }

    public function criar(Usuario $usuario)
    {
        $create = array(
            'name'          => $usuario->getName(),
            'email'         => $usuario->getEmail(),
            'password'      => $usuario->getPassword(),
            'date_of_birth' => $usuario->getDate_of_birth(),
            'type'          => $usuario->getType(),
        );

       $this->model->create($create);

        return true;
    }

    public function editar(Usuario $usuario)
    {
        return $this->model->where(['id' => $usuario->getId(), 'status' => 1])->first();
    }

    public function atualizar(Usuario $usuario)
    {
          $update = array(
            'name'          => $usuario->getName(),
            'email'         => $usuario->getEmail(),
            'date_of_birth' => $usuario->getDate_of_birth(),
            'type'          => $usuario->getType(),
        );
       $this->model->where(['id' => $usuario->getId(), 'status' => 1])->update($update);

        return true;
    }


    public function deletar(Usuario $usuario)
    {
       $this->model->where(['id' => $usuario->getId()])->update(['status' => 0]);

        return true;
    }

}

