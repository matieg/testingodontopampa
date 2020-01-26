@extends('admin.layouts.panel')
@section('titulo_panel', 'Editar marca')
@section('body_panel')
	<form action="{{ url('/admin/marcas/'.$marca->id) }}" method="post" accept-charset="utf-8">
    @method('PUT')
    @csrf()
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$marca->nombre}}">
      	</div>
          <div class="text-center">
        	 <button type="submit" class="btn btn-primary center">Guardar</button>
	       </div>
  </form>
@endsection