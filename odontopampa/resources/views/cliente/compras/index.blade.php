@extends('layouts.main')
@section('css')
	<link type="text/css" rel="stylesheet" href="{{asset('producto_css/css/nouislider.min.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('producto_css/css/slick.css')}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset('producto_css/css/slick-theme.css')}}"/>
 	<link type="text/css" rel="stylesheet" href="{{asset('producto_css/css/style.css')}}"/>
  	<script src="{{asset('producto_js/js/nouislider.min.js')}}"></script>
@endsection
@section('contenido')

	<h1 class="text-center">Producto: {{$producto->nombre}}</h1>
	<div class="catalogo mt-3 mb-3 container col-12">
		<div class="row">


		<div class="section col-12">
			<!-- container -->
			<div class="container col-12">
				<!-- row -->
				<div class="row col-12">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							@foreach($galeria as $gal)
							<div class="product-preview">
								<?php
									$archivo=explode("/",$gal->ruta);
									$img=$gal->ruta;
					                $archivonuevo=explode(".", $archivo[2]);
					                if(is_file($archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1])){
					                	$img=$archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1];
									}
								?>
								<img src="/{{$img}}" alt="" class="col-12">
							</div>
							@endforeach

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							@foreach($galeria as $gal)
							<div class="product-preview">
								<?php
									$archivo=explode("/",$gal->ruta);
									$img=$gal->ruta;
					                $archivonuevo=explode(".", $archivo[2]);
					                if(is_file($archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1])){
					                	$img=$archivo[0]."/".$archivo[1]."/".$archivonuevo[0]."-mini.".$archivonuevo[1];
									}
								?>
								<img src="/{{$img}}" alt="">
							</div>
							@endforeach

						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$producto->nombre}}</h2>
							<div>
								<h3 class="product-price">$980.00</h3>
								<span class="product-available">En stock</span>
							</div>
							<p>{{$producto->descripcion}}</p>

							<div class="add-to-cart mt-3">
								<div class="qty-label">
									Cantidad
									<div class="input-number">
										<input type="number" name="cantidad" value="1">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button id="agregar_carrito" data-idproducto="{{$producto->id}}" class="add-to-cart-btn agregar_carrito"><i class="fa fa-shopping-cart"></i> Agregar al carrito</button>
							</div>

							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#">{{$producto->categoria->nombre}}</a></li>
							</ul>

							<ul class="product-links">
								<li>Compartir en:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>



		</div>
	</div>

@if(isset(Auth::user()->id))

<div id="carritoo"></div>
@endif
@endsection
@section('js')


<script src="{{asset('producto_js/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('producto_js/js/slick.min.js')}}"></script>
<script src="{{asset('producto_js/js/main.js')}}"></script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script type="text/babel" src="{{asset('componentes/carrito.js')}}"></script>
<script type="text/babel">
var producto_id;

$('.agregar_carrito').on("click", function(){
	producto_id=$(this).data("idproducto");
	    jQuery.ajax({
            type:"get",
            contentType:false,
            data:{producto_id:producto_id},
            url:"/cliente/compra/agregarcarrito/",
            dataType:'json',
              success:function(r){
              	if(r.success==true){
              		ReactDOM.render(<MostrarCarrito/>, document.getElementById("carritoo"))
              	}
              }
          })
});


class MostrarCarrito extends React.Component {
	    constructor(props) {
	      super(props);
	      this.state = {
	        error: null,
	        isLoaded: true,
	      };
	    }
	      	render() {
	        	return (
	             	<div>
	               		<Carrito textoboton="confirmar compra" urlboton="/cliente/compra/micarrito/ver/confirmarpago" />
	             	</div>
	        	);
	    	}
 	}
ReactDOM.render(<MostrarCarrito/>, document.getElementById("carritoo"))

</script>

@endsection
