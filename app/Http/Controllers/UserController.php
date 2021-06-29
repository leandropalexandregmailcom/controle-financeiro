<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\EditUserRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    private $model;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index()
    {
        return redirect()->route('index.renda');
        //return view('user/index')->with('users',$this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('user/show');
    }

    public function create(CreateUserRequest $request)
    {
        $this->model->create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'date_of_birth' => $request->date_of_birth,
        ]);

        session()->flash('msg', 'O usuário foi cadastrado com sucesso!');

        return redirect()->route('login');
    }

    public function update(UpdateUserRequest $request)
    {
        $this->model->update($request->except('_token'));

        session()->flash('msg', 'O usuário foi atualizado com sucesso!');

        return redirect()->route('index');
    }

    public function edit(Request $request)
    {
        return view('user/edit')->with('user', $this->model->where(['status' => 1])->findOrFail($request->id));
    }

    public function delete(EditUserRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);

        return true;
    }
}
