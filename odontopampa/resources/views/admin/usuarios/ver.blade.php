@extends('admin.layouts.panel')
@section('titulo_panel', 'Dato de usuario')
@section('body_panel')
  <form action="{{url('/admin/usuarios/eliminar/'.$usuario->id)}}" method="get" accept-charset="utf-8" class="row">
    @csrf()
        <div class="form-group col-6">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->nombre}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Cuit</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->cuit}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Domicilio</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->domicilio}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Localidad</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->localidad}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Telefono</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->telefono}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">CP</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->cp}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Email</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->email}}">
        </div>
        <div class="form-group col-6">
          <label for="nombre">Fecha de registro</label>
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$usuario->created_at }}">
        </div>
          <div class="col-12 mt-2">
              <div class="border-bottom border-top">
                  <h2 class="text-center">Pedidos</h2>
              </div>
              <div class="col-12 row">
                  <div class="form-group col-4">
                  <label for="nombre">Observados</label>
                    <input type="text" class="form-control text-success" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$carrito->count() }}">
                  </div>
                  <div class="form-group col-4">
                  <label for="nombre">Realizados</label>
                    <input type="text" class="form-control text-success" id="nombre" name="nombre" placeholder="Nombre de marca" value="{{$pedidos->count() }}">
                  </div>
                  <div class="form-group col-4">
                  <label for="nombre">Concretados</label>
                    <input type="text" class="form-control text-success" id="nombre" name="nombre" placeholder="Nombre de marca" value="sin terminar">
                  </div>
              </div>
          </div>
          <div class="text-center col-12 mt-4">
           <button type="submit" class="btn btn-danger center">Eliminar</button>
           <a href="/admin/usuarios" type="submit" class="btn btn-primary center">Salir</a>
         </div>
  </form>
@endsection
