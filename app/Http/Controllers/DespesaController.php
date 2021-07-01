<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Despesa;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\FormaPagamento;
use Illuminate\Support\Facades\Auth;
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
        return view('despesa/index')->with('despesas',$this->model->paginate(10));
    }

    public function show()
    {
        return view('despesa/create')
        ->with('categorias', Categoria::where(['id_user' => Auth::user()->id])->get())
        ->with('formas_pagamento', FormaPagamento::where(['id_user' => Auth::user()->id])->get());
    }

    public function create(CreateDespesaRequest $request)
    {
        $this->model->create($request->all());

        session()->flash('msg', 'O despesa foi cadastrado com sucesso!');

        return redirect()->route('index.despesa');
    }

    public function update(UpdateDespesaRequest $request)
    {
        $this->model->where(['id_despesa' => $request->id_despesa])->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data' => Carbon::createFromFormat('m/d/Y', $request->data)->format('Y-m-d')
        ]);

        session()->flash('msg', 'O despesa foi atualizada com sucesso!');

        return redirect()->route('index.despesa');
    }

    public function edit(Request $request)
    {

        return view('despesa/edit')->with('despesa', $this->model->where(['id_despesa' => $request->id])->first());
    }

    public function delete(EditDespesaRequest $request)
    {
        $this->model->where(['id_despesa' => $request->id])->delete();
    }
}
