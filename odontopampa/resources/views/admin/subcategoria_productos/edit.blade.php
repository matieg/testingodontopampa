@extends('admin.layouts.panel')
@section('titulo_panel', 'Editar subcategoría')
@section('body_panel')
	<form action="{{ url('/admin/subcategorias/'.$subcategoria_producto->id) }}" method="post" accept-charset="utf-8">
    	@method('PUT')
    	@csrf()
      	<div class="form-group">
            <label for="nombre">Nombre</label>
        	<input type="text" class="form-control" id="nombre" name="nombre" value="{{$subcategoria_producto->nombre}}">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select class="form-control" name="categoria" id="categoria">
                @forelse($categorias as $categoria)
                    @if($categoria->id == $subcategoria_producto->categoria_producto->id)
                        <option selected value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @else
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endif
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
