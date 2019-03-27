<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!-- Styles -->
	<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
	<link href="{{ asset('material/css/material-dashboard.min.css') }}" rel="stylesheet" />
	<style type="text/css">
		figure {
			width: 100%;
			padding-bottom: 75%;
			background-repeat: no-repeat;
			background-position: center;
			border-radius: 5px;
			background-size: cover;
		}
		.main-panel>.content {
			margin-top: 0;
		}
	</style>
	@stack('styles')
</head>
<body>
	<div class="wrapper">
		<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('material/img/sidebar-1.jpg') }}">
			<!--
				Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

				Tip 2: you can also add an image using data-image tag
			-->
			<div class="logo">
				<span class="simple-text logo-normal">
					{{ config('app.name', 'Laravel') }}
				</span>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
				@else
					<li class="nav-item @if (Route::currentRouteName() == 'home') active @endif">
						<a class="nav-link" href="{{ route('home') }}">
							<i class="material-icons">dashboard</i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if (Route::currentRouteName() == 'empresas') active @endif" href="{{ route('empresas') }}">
							<i class="material-icons">location_city</i>
							<p>Empresas</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link @if (Route::currentRouteName() == 'funcionarios') active @endif" href="{{ route('funcionarios') }}">
							<i class="material-icons">assignment_ind</i>
							<p>Funcionários</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if (Route::currentRouteName() == 'perfil') active @endif" href="#" >
							<i class="material-icons">person</i>
							{{ Auth::user()->name }}
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="material-icons">close</i>
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				@endguest
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
				<div class="container-fluid">
					<div class="navbar-wrapper">
					</div>
					<button class="navbar-toggler float-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse justify-content-end">
						<ul class="navbar-nav">
						</ul>
					</div>
				</div>
			</nav>
			@yield('content')
		</div>
	</div>

	<!-- Scripts -->
	<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
	<!--   Core JS Files   -->
	<script src="{{ asset('material/js/core/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('material/js/core/popper.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('material/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('material/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
	<!--  Google Maps Plugin    -->
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script> -->
	<!-- Chartist JS -->
	<script src="{{ asset('material/js/plugins/chartist.min.js') }}"></script>
	<!--  Notifications Plugin    -->
	<script src="{{ asset('material/js/plugins/bootstrap-notify.js') }}"></script>
	<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="{{ asset('material/js/material-dashboard.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		// FileInput
		$('.form-file-simple .inputFileVisible').click(function() {
			$(this).siblings('.inputFileHidden').trigger('click');
		});

		$('.form-file-simple .inputFileHidden').change(function() {
			var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
			$(this).siblings('.inputFileVisible').val(filename);
		});

		$('.form-file-multiple .inputFileVisible, .form-file-multiple .input-group-btn').click(function() {
			$(this).parent().parent().find('.inputFileHidden').trigger('click');
			$(this).parent().parent().addClass('is-focused');
		});

		$('.form-file-multiple .inputFileHidden').change(function() {
			var names = '';
			for (var i = 0; i < $(this).get(0).files.length; ++i) {
				if (i < $(this).get(0).files.length - 1) {
					names += $(this).get(0).files.item(i).name + ',';
				} else {
					names += $(this).get(0).files.item(i).name;
				}
			}
			$(this).siblings('.input-group').find('.inputFileVisible').val(names);
		});

		$('.form-file-multiple .btn').on('focus', function() {
			$(this).parent().siblings().trigger('focus');
		});

		$('.form-file-multiple .btn').on('focusout', function() {
			$(this).parent().siblings().trigger('focusout');
		});
	</script>
	@stack('scripts')
</body>
</html>
