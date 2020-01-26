@extends('admin.layouts.panel')
@section('titulo_panel', 'Nueva Subategoría')
@section('body_panel')
	<form action="{{ url('/admin/subcategorias') }}" method="post" accept-charset="utf-8">
    @csrf()
      	<div class="form-group">
        	<label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Subategoría">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" id="categoria">
                @forelse($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @empty
                    <option disabled value="">No existen categorías</option>
                @endforelse
            </select>    
        </div>  
        <div class="text-center">
        	<button type="submit" class="btn btn-primary center">Guardar</button>
	    </div>
  </form>
@endsection
