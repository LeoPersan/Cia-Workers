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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection