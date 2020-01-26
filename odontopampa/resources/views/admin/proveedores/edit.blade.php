@extends('admin.layouts.panel')
@section('titulo_panel', 'Editar proveedor')
@section('body_panel')
	<form action="{{ url('/admin/proveedores/'.$proveedor->id) }}" method="post" accept-charset="utf-8">
        @method('PUT')
        @csrf
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$proveedor->nombre}}">
      	</div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary center">Guardar</button>
	    </div>
  </form>
@endsection