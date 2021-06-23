<?php

namespace App\Http\Controllers;

use App\Models\TipoFinanca;
use Illuminate\Http\Request;
use App\Http\Requests\TipoFinanca\EditTipoFinancaRequest;
use App\Http\Requests\TipoFinanca\CreateTipoFinancaRequest;
use App\Http\Requests\TipoFinanca\UpdateTipoFinancaRequest;

class TipoFinancaController extends Controller
{
    private $model;

    function __construct(TipoFinanca $tipo_financa)
    {
        $this->model = $tipo_financa;
    }

    public function index()
    {
        return view('tipo_financa/index')->with('tipo_financas',$this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('tipo_financa/show');
    }

    public function create(CreateTipoFinancaRequest $request)
    {
        $request->id_user = auth()->user()->id;
        $this->model->create($request->all());

        session()->flash('msg', 'O tipo de finança foi cadastrado com sucesso!');

        return redirect()->route('index');
    }

    public function update(UpdateTipoFinancaRequest $request)
    {
        $request->id_user = auth()->user()->id;
        $this->model->update($request->except('_token'));

        session()->flash('msg', 'O tipo de finança foi atualizada com sucesso!');

        return redirect()->route('index');
    }

    public function edit(EditTipoFinancaRequest $request)
    {
        $this->model->findOrFail($request->id);

        return view('tipo_financa/edit')->with('tipo_financa', $this->model->where(['status' => 1])->findOrFail($request->id));
    }

    public function delete(EditTipoFinancaRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);
    }
}
