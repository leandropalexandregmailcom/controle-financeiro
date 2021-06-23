<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\Categoria\EditCategoriaRequest;
use App\Http\Requests\Categoria\CreateCategoriaRequest;
use App\Http\Requests\Categoria\UpdateCategoriaRequest;

class CategoriaController extends Controller
{
    function __construct(Categoria $categoria)
    {
        $this->model = $categoria;
    }

    public function index()
    {
        return view('categoria/index')->with('categoria',$this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('categoria/show');
    }

    public function create(CreateCategoriaRequest $request)
    {
        $this->model->create($request->all());

        session()->flash('msg', 'A categoria foi cadastrada com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateCategoriaRequest $request)
    {
        $this->model->update($request->except('_token'));

        session()->flash('msg', 'A categoria foi atualizada com sucesso!');

        return redirect()->route('index');
    }

    public function edit(EditCategoriaRequest $request)
    {
        $this->model->findOrFail($request->id);

        return view('categoria/edit')->with('categoria', $this->model->where(['status' => 1])->findOrFail($request->id));
    }

    public function delete(EditCategoriaRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);
    }
}
