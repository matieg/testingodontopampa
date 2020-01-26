@extends('admin.layouts.panel')
@section('titulo_panel', 'Editar categoría')
@section('body_panel')
	<form action="{{ url('/admin/categorias/'.$categoria_producto->id) }}" method="post" accept-charset="utf-8">
    	@method('PUT')
    	@csrf()
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria_producto->nombre}}">
      	</div>
        <div class="text-center">
        	<button type="submit" class="btn btn-primary center">Guardar</button>
	    </div>
  </form>
@endsection
