@extends('admin.layouts.panel')
@section('titulo_panel', 'Proveedores')
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
              
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
            @forelse($proveedores as $proveedor)
              <tr>
                <td>{{$proveedor->nombre}}</td>
                <td>
                  <a href="{{url('/admin/proveedores/'.$proveedor->id.'/edit')}}" title="Editar" class="btn btn-info btn-flat float-left">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form class="ml-3 float-left" action="{{url('/admin/proveedor/'.$proveedor->id)}}" method="POST">
                     @method('DELETE')
                     @csrf
                     <button class="btn btn-danger btn-flat" title="Eliminar" type="submit"><i class="fa fa-trash"></i></button>               
                  </form>

                </td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">No se encontraron Proveedores.</td></tr>
            @endforelse
          </tbody>
        </table>
  </section>

@endsection