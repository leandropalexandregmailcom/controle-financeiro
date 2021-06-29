<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\TipoFinanca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('categoria/index')->with('categorias', $this->model->where(['status' => 1])->paginate(10));
    }

    public function show()
    {
        return view('categoria/create')->with('tipo_financas', TipoFinanca::where(['status' => 1])->get());
    }

    public function create(CreateCategoriaRequest $request)
    {
        $this->model->create([
            'nome'              => $request->nome,
            'descricao'         => $request->descricao,
            'nome_tipo_financa' => $request->nome_tipo_financa,
            'id_user'           => Auth::user()->id
        ]);

        session()->flash('msg', 'A categoria foi cadastrada com sucesso!');

        return redirect()->route('index.categoria');
    }

    public function update(UpdateCategoriaRequest $request)
    {
        $this->model->where(['id_categoria' => $request->id])->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'nome_tipo_financa' => $request->nome_tipo_financa
        ]);

        session()->flash('msg', 'A categoria foi atualizada com sucesso!');

        return redirect()->route('index.categoria');
    }

    public function edit(Request $request)
    {
        return view('categoria/edit')->with('categoria', $this->model->where(['status' => 1, 'id_categoria' => $request->id])->first());
    }

    public function delete(EditCategoriaRequest $request)
    {
        $this->model->where(['id_categoria' => $request->id])->update(['status' => 0]);

        return true;
    }
}
