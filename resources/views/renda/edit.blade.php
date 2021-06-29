@extends('welcome')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Atualizar Renda</h3>
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
    <form role="form" method = "post" action = "{{ route('update.renda') }}">
      <div class="card-body">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" value = "{{ $renda->nome }}" id="name" name = "nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="text">Descricão</label>
            <input type="text" class="form-control" value = "{{ $renda->descricao }}" id="descricao" name = "descricao" placeholder="Descrição">
        </div>
        <div class="form-group col-md-3">
            <label for="email">Data</label>
            <input class = "form-control date" value="{{ \Carbon\Carbon::parse($renda->data)->format('d/m/Y')}}"  type="text" data-date-format="DD MMMM YYYY"  name = "data" placeholder="Data">
        </div>
      </div>
      <input type = "hidden" name = "id_renda" value = "{{ $renda->id_renda }}">
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </div>
    </form>
  </div>
  <script>
      $(document).ready(function(){
        $('.date').mask('00/00/0000');
        });
  </script>
@endsection
