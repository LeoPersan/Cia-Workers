@extends('layouts.app')

@section('titulo', $funcionario->nome)

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<p class="card-category">
							{{ $funcionario->nome }}
						</p>
					</div>
					<div class="card-body">
						<dl>
							<dt>Telefone</dt>
							<dd>{{ $funcionario->nome }}</dd>
							<dt>E-mail</dt>
							<dd>{{ $funcionario->email }}</dd>
							<dt>CPF</dt>
							<dd>{{ $funcionario->cpf }}</dd>
							<dt>Empresa</dt>
							<dd>{{ $funcionario->empresa->nome }}</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection