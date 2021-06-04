<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('user/index')->with('users', User::where(['status' => 1])->get());
    }

    public function show()
    {
        return view('user/show');
    }

    public function create(CreateUserRequest $request)
    {
        User::create($request->all());

        session()->flash('msg', 'O usuário foi cadastrado com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateUserRequest $request)
    {

        $update = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'date_of_birth'  => $request->date_of_birth,
            'type'           => $request->type,
        );

        User::where(['id' => $request->id])->update($update);

        session()->flash('msg', 'O usuário foi atualizado com sucesso!');

        return redirect()->route('index');
    }

    public function edit(Request $request)
    {
        return view('user/edit')->with('user', User::where(['id' => $request->id])->first());
    }

    public function delete(Request $request)
    {
        User::where(['id' => $request->id])->update(['status' => 0]);

        return true;
    }
}
