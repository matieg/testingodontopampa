@extends('admin.layouts.panel')
@section('titulo_panel', 'Productos')
@section('body_panel')
@include('flash::message')
  <section class="">
        <form role="search" class="navbar-form" action="{{ url('/admin/producto') }}" method="GET">
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
              
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            @forelse($productos as $producto)
              <tr>
                <td>{{$producto->nombre}}</td>
                <td>
                  
                  <a href="{{url('/admin/producto/editar/'.$producto->id)}}" title="Editar" class="btn btn-info btn-flat float-left">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form class="ml-3 float-left" action="/admin/producto/eliminar" method="POST">
                     @csrf
                     <input type="hidden" name="producto_id" value="{{$producto->id}}">
                     <button class="btn btn-danger btn-flat" title="Eliminar" type="submit"><i class="fa fa-trash"></i></button>               
                  </form>

                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">No se encontraron productos.</td></tr>
            @endforelse
          </tbody>
        </table>
  </section>

@endsection