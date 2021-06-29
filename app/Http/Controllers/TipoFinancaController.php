<?php

namespace App\Http\Controllers;

use App\Models\TipoFinanca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('tipo_financa/create');
    }

    public function create(CreateTipoFinancaRequest $request)
    {
        $this->model->create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'id_user'   => Auth::user()->id
        ]);

        session()->flash('msg', 'O tipo de finança foi cadastrado com sucesso!');

        return redirect()->route('index.tipo_financa');
    }

    public function update(UpdateTipoFinancaRequest $request)
    {
        $request->id_user = auth()->user()->id;
        $this->model->where('id_user' => auth()->user()->id)update($request->except('_token'));

        session()->flash('msg', 'O tipo de finança foi atualizada com sucesso!');

        return redirect()->route('index');
    }

    public function edit(Request $request)
    {
        return view('tipo_financa/edit')->with('tipo_financa', $this->model->where(['status' => 1, 'id_tipo_financa' => $request->id])->first());
    }

    public function delete(EditTipoFinancaRequest $request)
    {
        $this->model->where(['id' => $request->id])->update(['status' => 0]);
    }
}
