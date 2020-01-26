@extends('admin.layouts.panel')
@section('titulo_panel', 'Nueva Categoría')
@section('body_panel')
	<form action="{{ url('/admin/categorias') }}" method="post" accept-charset="utf-8">
    @csrf()
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Categoría">
      	</div>
        <div class="text-center">
        	<button type="submit" class="btn btn-primary center">Guardar</button>
	    </div>
  </form>
@endsection
