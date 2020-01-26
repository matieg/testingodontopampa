<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('titulo', 'Odontopampa')</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/plugins/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('/plantillas/Admin/dist/css/adminlte.min.css')}}">
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
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/index.css')}}">
	@yield('css')
</head>
<body>
	<div class="header-top">
			<p class="float-right">Whatsapp <i class="fa fa-whatsapp"></i> 2954 589992</p>
	</div>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="header-brand col-md-4">
					<h1 class="">Odontopampa</h1>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	
	<div class="container mt-5 text-center">
		<h2 class="text-danger">Tu cuenta a sido suspendida.</h2>
		<p>Si considerás que hubo un error favor comuniquese con el administrador del sitio.</p>
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