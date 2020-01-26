@extends('admin.layouts.contenido')
@section('titulo', 'OdontoPampa')
@section('contenido')
	<section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card direct-chat direct-chat-primary">
              <div class="card-header">
                <h2 class="card-title text-center">@yield('titulo_panel','')</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-3">
                <!-- Conversations are loaded here -->
                @yield('body_panel', '')
              </div>
            </div>
          </section>
        </div>
      </div><!-- /.container-fluid -->
    </section>

@endsection