<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Http\Requests\Despesa\EditDespesaRequest;
use App\Http\Requests\Despesa\CreateDespesaRequest;
use App\Http\Requests\Despesa\UpdateDespesaRequest;

class DespesaController extends Controller
{
    private $model;

    function __construct(Despesa $despesa)
    {
        $this->model = $despesa;
    }

    public function index()
    {
        return view('despesa/index')->with('despesas',$this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('despesa/show');
    }

    public function create(CreateDespesaRequest $request)
    {
        $this->model->create($request->all());

        session()->flash('msg', 'O despesa foi cadastrado com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateDespesaRequest $request)
    {
        $this->model->update($request->except('_token'));

        session()->flash('msg', 'O despesa foi atualizada com sucesso!');

        return redirect()->route('index');
    }

    public function edit(EditDespesaRequest $request)
    {
        $this->model->findOrFail($request->id);

        return view('despesa/edit')->with('despesa', $this->model->where(['status' => 1])->findOrFail($request->id));
    }

    public function delete(EditDespesaRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);
    }
}
