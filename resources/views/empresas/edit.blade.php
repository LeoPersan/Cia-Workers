@extends('layouts.app')

@section('titulo', 'Nova Empresa')

@section('content')
<!-- End Navbar -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<p class="card-category">
						</p>
					</div>
					<div class="card-body">
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif
						<form method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label>Nome</label>
								<input name="nome" type="text" class="form-control" value="{{ $empresa->nome }}">
							</div>
							<div class="form-group">
								<label>E-mail</label>
								<input name="email" type="email" class="form-control" value="{{ $empresa->email }}">
							</div>
							<div class="form-group">
								<label>Website</label>
								<input name="website" type="text" class="form-control" value="{{ $empresa->website }}">
							</div>
							<div class="form-group form-file-upload form-file-multiple">
								<input name="logo" accept="image/*" type="file" multiple="" class="inputFileHidden">
								<div class="input-group">
									<input type="text" class="form-control inputFileVisible" placeholder="Single File">
									<span class="input-group-btn">
										<button type="button" class="btn btn-fab btn-round btn-primary">
											<i class="material-icons">attach_file</i>
										</button>
									</span>
								</div>
								<div class="col-3">
									<figure style="background-image: url('{{ asset($empresa->logoPath) }}')"></figure>
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Salvar</button>
							<a href="{{ route('empresas') }}" class="btn btn-warning">Cancelar</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection