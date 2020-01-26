@extends('layouts.main')
@section('usuario_nombre')
		{{-- @if(isset(Auth::user()->nombre) && Auth::user()->estado!='administrador')
		<h5 class="m-1">Bienvenido usuario {{Auth::user()->nombre}}</h5>
		@endif --}}
@endsection
@section('css')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

@section('contenido')
    @if(Session::has('msj'))
        <script type="text/javascript">
            Swal.fire(
                '¡Felicidades!',
                'Su compra fue un exito.',
                'success'
                )
        </script>
    @endif
	<h1 class="text-center">Nuestros productos</h1>
	<div class="catalogo mt-3 mb-3 container">
		<div class="row">
            @forelse($productos as $producto)
                <div class="col-lg-3 col-5">
                    <div class="producto-item">
                      <div class="contenedor-producto-imagen">
                        @if(App\GaleriaImagenes::where('producto_id', $producto->id)->first())
                            <?php
                                $imagen=App\GaleriaImagenes::where('producto_id', $producto->id)->first()->ruta;
                                $miniatura=$imagen;
                                $archivo=explode("/", $imagen);
                                //con esto compruebo que la imagen exista en la ruta nueva (que esta sin la fecha)
                                //si existe cargo la imagen minificada, sino cargo la original
                                if(is_file($archivo[0]."/".$archivo[1]."/".$archivo[2])){
                                    $archivonuevo=explode(".", $archivo[2]);
                                    if(is_file($archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1])){
                                        $miniatura=$archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1];
                                    }
                                }else{
                                    $miniatura=$imagen;
                                }
                            ?>
                            <img class="producto-imagen img-principal" src="{{asset($miniatura)}}" alt="{{$producto->nombre}}">
                            <img class="producto-imagen img-fondo" src="{{asset($miniatura)}}" alt="{{$producto->nombre}}">
                        @else
                            <img class="producto-imagen" src="images/noimagen.png" alt="foto">
                        @endif
                    </div>
                    <div class="contenedor-producto-descripcion">
                        <p>{{$producto->nombre}}</p>
                    </div>
                    <div class="contenedor-producto-precio">
                        <p>${{$producto->precio_venta}}</p>
                    </div>
                    @unless(Auth::guest() || Auth::user()->estado == 'administrador')
                        <div class="contenedor-producto-accion">
                            <a href="{{url('/cliente/compra/'.$producto->id.'/'.$producto->nombre)}}" class="btn btn-danger btn-block" title=""><i class="fa fa-cart-plus"></i> Comprar</a>
                        </div>
                    @endunless  
                    </div>
                    
				</div>
				@empty
				<div class="mt-5 col-12 text-center">
					<h5>No hay productos cargados aún, en breve actualizaremos nuestro stock.</h5>
				</div>
			@endforelse
		</div>
	</div>
@endsection
@section('js')

@endsection
