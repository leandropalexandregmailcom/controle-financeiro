<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Renda;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\FormaRecebimento;
use Illuminate\Support\Facades\Auth;
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
        return view('renda/index')->with('rendas',$this->model->paginate(10));
    }

    public function show()
    {
        return view('renda/create')
        ->with('categorias', Categoria::where(['id_user' => Auth::user()->id])->get())
        ->with('formas_recebimento', FormaRecebimento::where(['id_user' => Auth::user()->id])->get());
    }

    public function create(CreateRendaRequest $request)
    {
        $this->model->create($request->all());

        session()->flash('msg', 'O renda foi cadastrado com sucesso!');

        return redirect()->route('index.renda');
    }

    public function update(UpdateRendaRequest $request)
    {
        $this->model->where(['id_renda' => $request->id_renda])->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'data' => Carbon::createFromFormat('m/d/Y', $request->data)->format('Y-m-d')
        ]);

        session()->flash('msg', 'O renda foi atualizada com sucesso!');

        return redirect()->route('index.renda');
    }

    public function edit(Request $request)
    {
        return view('renda/edit')
        ->with('renda', $this->model->where(['status' => 1, 'id_renda' => $request->id])->first())
        ->with('formas_recebimento', FormaRecebimento::where(['id_user' => Auth::user()->id])->get());
    }

    public function delete(EditRendaRequest $request)
    {
        $this->model->where(['id_renda' => $request->id])->delete();
        return true;
    }
}
