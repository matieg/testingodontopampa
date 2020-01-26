@extends('admin.layouts.panel')
@section('titulo_panel', 'Usuarios registrados')
@section('body_panel')
  <section class="">
        <form role="search" class="navbar-form" action="{{ url('/admin/marcas') }}" method="GET">
          <div class="input-group col-md-5">
                  <input type="text" name="nombre" placeholder="Buscar" class="form-control">
                  <span class="input-group-append">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button></span>
            </div>
        </form>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Domicilio</th>
              <th>creado</th>
              
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            @forelse($usuarios as $usuario)
              <tr>
                <td>{{$usuario->nombre}}</td>
                <td>{{$usuario->domicilio}}, {{$usuario->localidad}} </td>
                <td>{{$usuario->updated_at}}</td>
                <td>
                  <a href="{{url('/admin/usuarios/'.$usuario->id)}}" title="Ver" class="btn btn-default btn-flat mr-3 float-left">
                    <i class="fa fa-eye"></i>
                  </a>                  
                  <a href="{{url('/admin/usuarios/'.$usuario->id.'/edit')}}" title="Editar" class="btn btn-info btn-flat float-left mr-3">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{url('/admin/usuarios/eliminar/'.$usuario->id)}}" title="Eliminar" class="btn btn-danger btn-flat float-left">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">No se encontraron Usuarios registrados.</td></tr>
            @endforelse
          </tbody>
        </table>
  </section>

@endsection