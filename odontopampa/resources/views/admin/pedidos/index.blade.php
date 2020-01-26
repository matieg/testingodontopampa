@extends('admin.layouts.panel')
@section('titulo_panel', 'Marcas')
@section('body_panel')
	<form role="search" class="navbar-form" action="{{ url('/admin/pedidos') }}" method="GET">
		<div class="input-group col-md-5">
            <input type="text" name="nombre" placeholder="Buscar" class="form-control">
            <span class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button></span>
	    </div>
	</form>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>Total</th>
				<th>Dirección</th>
				<th>Localidad</th>
				<th>Provincia</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@forelse($pedidos as $pedido)
				<tr>
					<td>{{$pedido->user->nombre}}</td>
					<td>{{$pedido->total}}</td>
					<td>{{$pedido->direccion}}</td>
					<td>{{$pedido->localidad}}</td>
					<td>{{$pedido->provincia}}</td>
					<td>
						
						<a href="{{url('/admin/pedidos/'.$pedido->id.'/edit')}}" class="btn btn-info btn-flat float-left">
							<i class="fa fa-edit"></i>
						</a>
						<form class="ml-3 float-left" action="{{url('/admin/pedidos/'.$pedido->id)}}" method="POST">
							 @method('DELETE')
							 @csrf
							 <button class="btn btn-danger btn-flat" type="submit"><i class="fa fa-trash"></i></button>               
						</form>

					</td>
				</tr>
			@empty
				<tr><td colspan="5" class="text-center">No se encontraron pedidos.</td></tr>
			@endforelse
		</tbody>
	</table>
@endsection