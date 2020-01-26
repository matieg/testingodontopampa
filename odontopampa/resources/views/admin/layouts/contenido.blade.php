{{-- <!DOCTYPE html> --}}
<html lang="es">
<head>
	@include('admin.layouts.header')
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		@include('admin.layouts.navbar')
		@include('admin.layouts.menu')
			<div class="content-wrapper">
   				<div class="content-header">
			      <div class="container-fluid">
			        <div class="row mb-2">
			          <div class="col-sm-6">
	 					<h1 class="m-0 text-dark">@yield('titulo_panel_1')</h1>
			          </div><!-- /.col -->
			          {{-- <div class="col-sm-6">
			            <ol class="breadcrumb float-sm-right">
			              <li class="breadcrumb-item"><a href="#">Home</a></li>
			              <li class="breadcrumb-item active">Dashboard v2</li>
			            </ol>
			          </div> --}}
			        </div>
			      </div>
			    </div>
			    @yield('contenido')
			</div>
		@include('admin.layouts.js')
		@include('admin.layouts.footer')
	</div>
</body>
</html>
