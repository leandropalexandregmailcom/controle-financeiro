@extends('welcome')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style = "margin: 8% 0 0; width: 40%;">
			<div class="card-body">
				<form method="POST" action="{{ route('create.gasto') }}">
                    @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name = "nome" placeholder="Nome">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="text" class="form-control" name = "descricao" placeholder="Descrição">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<select class="form-control" name = "categoria">
                            @foreach($categorias as $categoria)
                                <option value = "{{ $categoria->id_categoria }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="date" class="form-control" name = "date" placeholder="Data">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn btn-primary float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
@endsection
