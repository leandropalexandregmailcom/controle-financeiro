@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cadastrar Renda</h3>
    </div>
    <div class = "panel-heading">
        <div class = "row m-1">
            <div class = "col-xs-4 align-left">
                <a href = "{{ route('index.renda') }}" role = "button" class = "btn btn-secondary" aria-expanded = "false">
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
    <form role="form" method = "post" action = "{{ route('create.renda') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="name">Categoria</label>
            <select name = "categoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option @if($categoria->id_categoria == $renda->id_categoria) selected @endif value = "{{ $categoria->id_categoria }}">
                            {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" value = "{{ |$renda->nome }}" id="name" name = "name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" class="form-control" value = "{{ $renda->descricao }}" id="descricao" name = "descricao" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label for="email">Data</label>
            <input class = "form-control" value="{{ $renda->date->format('d/m/Y') }}"  type="date" data-date-format="DD MMMM YYYY"  name = "data" placeholder="Data">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
  </div>
@endsection
