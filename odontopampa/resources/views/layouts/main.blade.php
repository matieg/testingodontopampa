<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('titulo', 'Odontopampa')</title>
    <link rel="icon" href="{{ asset('images/Favicon Odontopampa.png') }}" type="image/ico">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/dist/css/adminlte.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/iCheck/flat/blue.css')}}">
	<!-- Morris chart -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/morris/morris.css')}}">
	<!-- jvectormap -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">

	  <!-- DataTables -->
	  <link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/datatables/dataTables.bootstrap4.min.css')}}">
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/datepicker/datepicker3.css')}}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Aleo|Lato&display=swap" rel="stylesheet">
	{{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
	@yield('css')
</head>
<body>
	<div class="header-top">
		<a href="https://wa.me/542954589992" class="float-left"> Whatsapp <i class="fa fa-whatsapp icono-whatsapp mr-1 ml-1"></i> 2954 589992 - </a>
		<a href="" class="float-left ml-2">Santa Rosa, La Pampa - </a>
		<a href="" class="float-left ml-2"><i class="fa fa-envelope mr-1 ml-1"></i>odontompampa@hotmail.com</a>

	</div>
	<div class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="header-brand col-md-4">
					<a href="{{url('/')}}">
						<img src="{{asset('images/OdontoPampa.png')}}" alt="">
					</a>
				</div>
				<div class="header-search col-md-4">
					<div class="input-group">
						<input type="text" name="" class="form-control" placeholder="Buscar un producto...">
						<div class="input-group-append">
							<button type="button" class="btn btn-info"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
				<div class="header-actions col-md-4">
					@if(Auth::guest())
					<a class="btn-flat btn-info" href="/login" title=""><i class="fa fa-sign-in"></i></a>
					@endif
					@if(Auth::check())
						@if(Auth::user()->estado == 'cliente')
							<a class="btn-flat btn-info" href="{{url('cliente/perfil/'.Auth::user()->id)}}" title="Mi perfil"><i class="fa fa-user"></i></a>
							<a class="btn-flat btn-info" href="{{url('cliente/compra/micarrito/'.Auth::user()->id)}}" title="Mi carrito"><i class="fa fa-shopping-cart"></i></a>
							<a class="btn-flat btn-info" href="{{url('tabla')}}" title="Mis pedidos"><i class="fa fa-briefcase"></i></a>
							@elseif(Auth::user()->estado == 'administrador')
							<a class="btn-flat btn-info" href="{{url('admin')}}" title="Panel de administracion"><i class="fa fa-gears"></i></a>
						@endif
					<a class="btn-flat btn-info" href="/logout" title="Salir"><i class="fa fa-sign-out"></i></a>
					@endif
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<nav class="">
		<ul class="menu-md container">
			@include('layouts.menucategorias')
		</ul>
 		<ul id="menu-sm" class="menu-sm container">
 			<li class="menu-item" id="boton-menu">
 				<button class="menu-boton" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="true" aria-controls="collapseOne">
		          <i class="fa fa-bars"></i>
		        </button>
		    </li>
		    <ul id="collapseMenu" class="collapse"  aria-labelledby="boton-menu" data-parent="#menu-sm">
		    	<li class="menu-item"><a class="menu-boton" href="" title="">Mi perfil</a></li>
				{{-- <li class="menu-item"><a class="menu-boton" href="{{url('cliente/compra/micarrito/'.Auth::user()->id)}}" title="">Mi carrito</a></li> --}}
				<li class="menu-item"><a class="menu-boton" href="" title="">Mis pedidos</a></li>
				@include('layouts.menucategorias')
		    </ul>
		</ul>
	</nav>
	<div>@yield('usuario_nombre')</div>
	<div class="container mt-5">
		@yield('contenido')
	</div>


<!-- jQuery -->
<script src="{{asset('plantillas/admin/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plantillas/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plantillas/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plantillas/admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('plantillas/admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plantillas/admin/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('plantillas/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('plantillas/admin/dist/js/demo.js')}}"></script>
	@yield('js', '')
</body>
</html>
