<?php

namespace App\Http\Controllers;

use App\Models\Renda;
use App\Http\Requests\Renda\EditRendaRequest;
use App\Http\Requests\Renda\CreateRendaRequest;
use App\Http\Requests\Renda\UpdateRendaRequest;

class RendaController extends Controller
{
    private $model;

    function __construct(Renda $renda)
    {
        $this->model = $renda;
    }

    public function index()
    {
        return view('renda/index')->with('rendas',$this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('renda/show');
    }

    public function create(CreateRendaRequest $request)
    {
        $this->model->create($request->all());

        session()->flash('msg', 'O renda foi cadastrado com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateRendaRequest $request)
    {
        $this->model->update($request->except('_token'));

        session()->flash('msg', 'O renda foi atualizada com sucesso!');

        return redirect()->route('index');
    }

    public function edit(EditRendaRequest $request)
    {
        $this->model->findOrFail($request->id);

        return view('renda/edit')->with('renda', $this->model->where(['status' => 1])->findOrFail($request->id));
    }

    public function delete(EditRendaRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);
    }
}
