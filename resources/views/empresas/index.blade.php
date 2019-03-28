@extends('layouts.app')

@push('scripts')
<script type="text/javascript">
	$('button.deletar').click(function() {
		if(!confirm('Você tem certeza que deseja deletar essa Empresa?')) return false;
	});
</script>
@endpush

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h2 class="card-title float-left">Empresas</h2>
						<p class="card-category">
							<a href="{{ route('empresaCreate') }}" class="btn btn-info float-right">Nova Empresa</a>
						</p>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<form method="get" class="row">
								<div class="form-group col-10">
									<input type="text" class="form-control" name="empresa" placeholder="Filtre pela Empresa" value="{{ $empresa }}">
								</div>
								<div class="form-group col-2">
									<button class="btn btn-info">Pesquisar</button>
								</div>
							</form>
							<table class="table table-hover">
								<thead class="text-primary">
									<th>
										Logo
									</th>
									<th>
										Nome
									</th>
									<th>
										E-mail
									</th>
									<th>
										Website
									</th>
									<th>
										Editar
									</th>
									<th>
										Excluir
									</th>
								</thead>
								<tbody>
									@foreach ($empresas as $empresa)
									<tr>
										<td>
									<figure style="background-image: url('{{ asset($empresa->logoPath) }}')"></figure>
										</td>
										<td>
											{{ $empresa->nome }}
										</td>
										<td>
											{{ $empresa->email }}
										</td>
										<td>
											{{ $empresa->website }}
										</td>
										<td>
											<a href="{{ route('empresaEdit',[$empresa->id]) }}" class="btn btn-warning">Editar</a>
										</td>
										<td>
											<form action="{{ route('empresaDestroy',[$empresa->id]) }}" method="post">
												@csrf()
												<button class="deletar btn btn-danger" class="btn-danger">Deletar</button>
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							{{ $empresas->links() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection