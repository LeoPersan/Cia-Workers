@extends('layouts.app')

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h2 class="card-title float-left">{{ $empresa->nome }}</h2>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
								<td rowspan="2"><b>Logo:</b> <figure style="background-image: url('{{ asset($empresa->logoPath) }}')"></figure></td>
								<td><b>E-mail:</b> {{ $empresa->email }}</td>
							</tr>
							<tr>
								<td><b>Website:</b> {{ $empresa->website }}</td>
							</tr>
						</table>
						<a href="{{ route('empresas') }}" class="btn btn-info">Empresas</a>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h2 class="card-title float-left">Funcionários</h2>
						<p class="card-category">
							<a href="{{ route('funcionarioCreate') }}?empresa_id={{ $empresa->id }}" class="btn btn-info float-right">Novo Funcionário</a>
						</p>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover">
								<thead class="text-primary">
									<th>
										Nome
									</th>
									<th>
										E-mail
									</th>
									<th>
										Telefone
									</th>
									<th>
										CPF
									</th>
									<th>
										Editar
									</th>
									<th>
										Excluir
									</th>
								</thead>
								<tbody>
									@foreach ($empresa->funcionarios as $funcionario)
									<tr>
										<td>
											<a href="{{ route('funcionario',[$funcionario->id]) }}">{{ $funcionario->nome }}</a>
										</td>
										<td>
											{{ $funcionario->email }}
										</td>
										<td>
											{{ $funcionario->telefone }}
										</td>
										<td>
											{{ $funcionario->cpf }}
										</td>
										<td>
											<a href="{{ route('funcionarioEdit',[$funcionario->id]) }}" class="btn btn-warning">Editar</a>
										</td>
										<td>
											<form action="{{ route('funcionarioDestroy',[$funcionario->id]) }}" method="post">
												@csrf()
												<button class="deletar btn btn-danger" class="btn-danger">Deletar</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection