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
						<h2 class="card-title float-left">Usuários</h2>
						<p class="card-category">
							<a href="{{ route('register') }}" class="btn btn-info float-right">Novo Usuário</a>
						</p>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<form method="get" class="row">
								<div class="form-group col-10">
									<input type="text" class="form-control" name="nome" placeholder="Filtre pelo Usuário" value="{{ $nome }}">
								</div>
								<div class="form-group col-2">
									<button class="btn btn-info">Pesquisar</button>
								</div>
							</form>
							<table class="table table-hover">
								<thead class="text-primary">
									<th>
										Nome
									</th>
									<th>
										Excluir
									</th>
								</thead>
								<tbody>
									@foreach ($usuarios as $usuario)
									<tr>
										<td>
											<a href="{{ route('usuario',[$usuario->id]) }}">{{ $usuario->name }}</a>
										</td>
										<td>
											<form action="{{ route('usuarioDestroy',[$usuario->id]) }}" method="post">
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