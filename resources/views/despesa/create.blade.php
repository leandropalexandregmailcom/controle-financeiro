@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cadastrar Despesa</h3>
    </div>
    <div class = "panel-heading">
        <div class = "row m-1">
            <div class = "col-xs-4 align-left">
                <a href = "{{ route('index.despesa') }}" role = "button" class = "btn btn-secondary" aria-expanded = "false">
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
    <form role="form" method = "post" action = "{{ route('create.despesa') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="name">Categoria</label>
            <select name = "categoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option value = "{{ $categoria->id_categoria }}">
                            {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name = "name" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" class="form-control" id="descricao" name = "descricao" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label for="email">Data</label>
            <input class = "form-control"  type="date" data-date-format="DD MMMM YYYY"  name = "data" placeholder="Data">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>
  </div>
@endsection
