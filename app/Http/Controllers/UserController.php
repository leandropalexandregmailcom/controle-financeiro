<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Classes\Usuario;
use App\Dao\UsuarioDao;
use App\Factory\UsuarioFactory;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    private $model;
    private $usuario;

    function __construct(UsuarioDao $user, Usuario $usuario)
    {
        $this->model = $user;
        $this->usuario = $usuario;
    }

    public function index()
    {
        return view('user/index')->with('users',$this->model->listar());
    }

    public function show()
    {
        return view('user/show');
    }

    public function create(CreateUserRequest $request, UsuarioFactory $factory)
    {
        User::create($request->all());

        session()->flash('msg', 'O usuário foi cadastrado com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateUserRequest $request, UsuarioFactory $factory)
    {
        $this->usuario->setId($request->id);
        $this->usuario->setName($request->name);
        $this->usuario->setEmail($request->email);
        $this->usuario->setDate_of_birth($request->date_of_birth);
        $this->usuario->setType($request->type);

        $factory->atualizar($this->usuario);

        session()->flash('msg', 'O usuário foi atualizado com sucesso!');

        return redirect()->route('index');
    }

    public function edit(EditUserRequest $request, UsuarioFactory $factory)
    {
        $this->usuario->setId($request->id);

        return view('user/edit')->with('user', $this->model->editar($this->usuario));
    }

    public function delete(Request $request)
    {
        $this->usuario->setId($request->id);

        return $this->model->deletar($this->usuario);
    }
}
