@extends('index')

@section('content')
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style = "margin: 8% 0 0; width: 40%;">
			<div class="card-body">
				<form method="POST" action="{{ route('create.user') }}">
                    @csrf
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name = "name" placeholder="Nome">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name = "email" placeholder="Email">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name = "password" placeholder="Senha">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="date" class="form-control" name = "date_of_birth" placeholder="Data de nascimento">
					</div>
					<div class="form-group">
						<input type="submit" value="Cadastrar" class="btn btn-primary float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
