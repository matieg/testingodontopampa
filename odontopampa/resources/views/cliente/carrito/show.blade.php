@extends('layouts.main')
@section('css')
 	<link type="text/css" rel="stylesheet" href="{{asset('producto_css/css/style.css')}}"/>
@endsection
@section('contenido')
@include('flash::message')
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<!-- Billing Details -->
						<div class="billing-details row">
							<div class="section-title col-12">
								<h3 class="title">Datos de la compra</h3>
							</div>
							<form class="col-lg-12 row" action="/cliente/compra/micarrito/confirmada" accept-charset="utf-8" method="get" id="form-finalizar-compra">
								<div class="form-group col-md-4">
									<input class="input" type="text" id="direccion" name="direccion" placeholder="Direccion" required>
								</div>
								<div class="form-group col-md-4">
									<input class="input" type="text" id="localidad" name="localidad" placeholder="Localidad" required>
								</div>
								<div class="form-group col-md-4">
									<input class="input" type="text" id="provincia" name="provincia" placeholder="Provincia" required>
								</div>
								<div class="order-notes col-md-12">
									<textarea class="input" id="descripcion" name="descripcion" placeholder="descripcion"></textarea>
								</div>
								<div class="form-group col-md-4">
									<select id="forma_pago" class="form-control" name="forma_pago">
										<option value="0" selected="selected">Forma de pago</option>
										<option value="contra reembolzo">Contra reembolso</option>
									 	<option value="mercadopago">Mercado Pago</option>
									</select>
								</div>
							</form>
						</div>
					</div>
 				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<div id="carritoo"></div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script type="text/babel" src="{{asset('componentes/carrito.js')}}"></script>
<script type="text/babel">
	class MostrarCarrito extends React.Component {
	    constructor(props) {
	      super(props);
	      this.state = {
	        error: null,
	        isLoaded: true,
	      };
	    }
	       handleClick = (e) => {
     			e.preventDefault();
     			if($('#forma_pago').val()!='0'){
     				if(campos_vacios()==true){
     					$("#form-finalizar-compra").submit();
     				}else{
     					Swal.fire({
     						icon:'error',
							title:'!Error!',
							text:'No puede haber campos vacios',
     					});
     				}
     			}else{
     					Swal.fire({
     						icon:'error',
							title:'!Error!',
							text:'Debe ingresar una forma de pago',
     					});
     			}
  			}
	      	render() {
	        	return (
	             	<div>
	               		<Carrito textoboton="Finaliar compra" urlboton="#" onClick={this.handleClick} />
	             	</div>
	        	);
	    	}
 	}
ReactDOM.render(<MostrarCarrito/>, document.getElementById("carritoo"))


	function campos_vacios(){
		if(	$("#direccion").val()!="" &&
			$("#localidad").val()!="" &&
			$("#provincia").val()!="" &&
			$("#descripcion").val()!=""
			){
				return true;
		}else{
				return false;
		}
	}

</script>
@endsection