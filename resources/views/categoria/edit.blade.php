@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Cadastrar Categoria</h3>
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
    <form role="form" method = "post" action = "{{ route('create.categoria') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="name">Tipo de finança</label>
            <select name = "tipo_financa" class="form-control">
                @foreach($tipo_financas as $tipo_financa)
                    <option @if($tipo_financa->id_tipo_financa == $categoria->id_tipo_financa)
                        selected
                        @endif
                        value = "{{ $tipo_financa->id_tipo_financa }}">
                            {{ $tipo_financa->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" value = "{{ $categoria->nome }}" class="form-control" id="nome" name = "nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" value = "{{ $categoria->descricao}}" class="form-control" id="descricao" name = "descricao" placeholder="Descrição">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>
  </div>
@endsection
