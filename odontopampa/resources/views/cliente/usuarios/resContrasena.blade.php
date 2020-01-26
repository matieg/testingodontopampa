    @extends('layouts.main')
    @section('contenido')
    @include('flash::message')
    	<form class="form-horizontal form-create row align-items-center text-center" role="form" method="POST" action="{{ url('/cliente/nuevaPass')}}">
    		{{csrf_field()}}
    	<div class="form-group col-6 offset-3">
          <label for="nombre">Contraseña Actual</label>
          <input type="password" class="form-control" id="conActual" name="conActual" placeholder="Contraseña actual">
        </div>
        <div class="form-group col-6 offset-3">
          <label for="nombre">Nueva Contraseña</label>
          <input type="password" class="form-control" id="conNueva" name="conNueva" placeholder="Nueva Contraseña">
        </div>
        <div class="form-group col-6 offset-3">
          <label for="nombre">Repetir Nueva Contraseña</label>
          <input type="password" class="form-control" id="conRepetir" name="conRepetir" placeholder="Repetir Nueva Contraseña">
          <input type="hidden" name="id" id="id" value="{{$usuario->id}}">
        </div>
        
        <div class="col-lg-4 form-group offset-4 pt-3">
          <input  type="submit" name="modificar" id="modificar" value="Guardar Cambios" class="btn btn-success">
        </div>


    	</form>
    @endsection