@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Atualizar Tipo de Finança</h3>
    </div>
    <div class = "panel-heading">
        <div class = "row m-1">
            <div class = "col-xs-4 align-left">
                <a href = "{{ route('index.tipo_financa') }}" role = "button" class = "btn btn-secondary" aria-expanded = "false">
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
    <form role="form" method = "post" action = "{{ route('update.tipo_financa') }}">
      <div class="card-body">
        @csrf
        <input type = "hidden" name = "id" value = "{{ $tipo_financa->id_tipo_financa }}">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="nome" value = "{{ $tipo_financa->nome }}" name = "nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" class="form-control" id="descricao" value = "{{ $tipo_financa->descricao }}" name = "descricao" placeholder="Descrição">
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
  </div>
@endsection
