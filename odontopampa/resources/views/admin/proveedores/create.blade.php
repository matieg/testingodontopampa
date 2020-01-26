@extends('admin.layouts.panel')
@section('titulo_panel', 'Proveedores')
@section('body_panel')
@include('flash::message')
  <section class="">
            <form method="post" action="/admin/proveedores/store" accept-charset="utf-8">
               @csrf()
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Nombre del provedor</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Arcor">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
       
  </section>

@endsection