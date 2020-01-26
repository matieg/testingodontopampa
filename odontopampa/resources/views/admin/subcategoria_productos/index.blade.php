@extends('admin.layouts.panel')
@section('titulo_panel', 'Subcategorías')
@section('body_panel')
	<form role="search" class="navbar-form" action="{{ url('/admin/subcategorias') }}" method="GET">
		<div class="input-group col-md-5">
            <input type="text" name="nombre" placeholder="Buscar" class="form-control">
            <span class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button></span>
	    </div>
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categoría</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse($subcategorias as $subcategoria)
				<tr>
					<td>{{$subcategoria->nombre}}</td>
					<td>{{$subcategoria->categoria_producto->nombre}}</td>
					<td>
						<a href="{{url('/admin/subcategorias/'.$subcategoria->id.'/edit')}}" class="btn btn-info btn-flat float-left">
							<i class="fa fa-edit"></i>
						</a>
						<form class="ml-3 float-left" action="{{url('/admin/subcategorias/'.$subcategoria->id)}}" method="POST">
							 @method('DELETE')
							 @csrf
							 <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i></button>               
						</form>

					</td>
				</tr>
			@empty
				<tr><td colspan="5" class="text-center">No se encontraron subcategorías.</td></tr>
			@endforelse
		</tbody>
	</table>
@endsection