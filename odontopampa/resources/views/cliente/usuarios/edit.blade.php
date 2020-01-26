    @extends('layouts.main')
    @section('contenido')
    @include('flash::message')
    <form class="form-horizontal form-create row text-center" role="form" method="POST" action="{{ url('/cliente/perfil/upd/'.$usuario->id)}}">
      {{csrf_field()}}
        @method('PUT')
        <div class="form-group col-6">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->nombre}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Cuit</label>
          <input type="text" class="form-control" id="cuit" name="cuit" placeholder="Nombre de marca" value="{{$usuario->cuit}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Domicilio</label>
          <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Nombre de marca" value="{{$usuario->domicilio}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Localidad</label>
          <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Nombre de marca" value="{{$usuario->localidad}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Telefono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Nombre de marca" value="{{$usuario->telefono}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">CP</label>
          <input type="text" class="form-control" id="cp" name="cp" placeholder="Nombre de marca" value="{{$usuario->cp}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Nombre de marca" value="{{$usuario->email}}">
        </div>

        <div class="col-lg-3 form-group pt-4">
          <input  type="submit" name="modificar" id="modificar" value="Guardar Cambios" class="btn btn-success">
        </div>
        <div class="col-lg-3 form-group pt-4">
            <a href="actualizarCon/{{$usuario->id}}" class="btn btn-primary">Cambiar Contraseña</a>
        </div>
      </form>


    @endsection