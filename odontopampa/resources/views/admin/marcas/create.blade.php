@extends('admin.layouts.panel')
@section('titulo_panel', 'Nueva marca')
@section('body_panel')
	<form action="{{ url('/admin/marcas') }}" method="post" accept-charset="utf-8">
    @csrf()
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca">
      	</div>
          <div class="text-center">
        	 <button type="submit" class="btn btn-primary center">Guardar</button>
	       </div>
  </form>
@endsection