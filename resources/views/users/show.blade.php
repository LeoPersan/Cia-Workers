@extends('layouts.app')

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h2 class="card-title float-left">{{ $usuario->name }}</h2>
					</div>
					<div class="card-body">
						<dl>
							<dt>Nome</dt>
							<dd>{{ $usuario->name }}</dd>
						</dl>
						<a href="{{ route('usuarios') }}" class="btn btn-info">Usuários</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection