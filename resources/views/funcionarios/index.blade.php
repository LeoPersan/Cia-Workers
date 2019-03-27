@extends('layouts.app')

@push('scripts')
<script type="text/javascript">
	$('button.deletar').click(function() {
		if(!confirm('Você tem certeza que deseja deletar essa funcionario?')) return false;
	});
</script>
@endpush

@section('titulo', 'Funcionários')

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<p class="card-category">
							<a href="{{ route('funcionarioCreate') }}" class="btn btn-info float-right">Novo Funcionário</a>
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
										Empresa
									</th>
									<th>
										Editar
									</th>
									<th>
										Excluir
									</th>
								</thead>
								<tbody>
									@foreach ($funcionarios as $funcionario)
									<tr>
										<td>
											{{ $funcionario->nome }}
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
											{{ $funcionario->empresa->nome }}
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