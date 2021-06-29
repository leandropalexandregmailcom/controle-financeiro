@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Editar Categoria</h3>
    </div>
    <div class = "panel-heading">
        <div class = "row m-1">
            <div class = "col-xs-4 align-left">
                <a href = "{{ route('index.categoria') }}" role = "button" class = "btn btn-secondary" aria-expanded = "false">
                    <i class = "fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if($errors->any())
    <div class = "alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form role="form" method = "post" action = "{{ route('update.categoria') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="name">Tipo de finança</label>
            <select name = "nome_tipo_financa" class="form-control">
                <option @if($categoria->nome_tipo_financa == "Renda") selected @endif value = "Renda">
                        Renda
                </option>
                <option @if($categoria->nome_tipo_financa == "Despesa") selected @endif value = "Despesa">
                    Despesa
                </option>
        </select>
        </div>
        <input value = "{{ $categoria->id_categoria }}" name = "id" type = "hidden">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" value = "{{ $categoria->nome }}" class="form-control" id="nome" name = "nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" value = "{{ $categoria->descricao}}" class="form-control" id="descricao" name = "descricao" placeholder="Descrição">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
  </div>
@endsection
