@extends('admin.layouts.panel')
@section('titulo_panel', 'Nuevo producto')
@section('body_panel')
  <section class="container">
      <form action="/admin/productos/guardar" method="post" accept-charset="utf-8" class="col-lg-12 row" id="form_carga_producto" enctype="multipart-form-data">
        @csrf()
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de producto" required>
            </div>
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="nombre">Descripcion</label>
              <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de producto" required></textarea>
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Cantidad</label>
              <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de producto" required>
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Precio de compra</label>
              <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio de compra" required>
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Precio de venta</label>
              <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio de venta" required>
            </div>
            <div class="separador col-lg-12 mt-4 mb-4"></div>
            <div class="form-group col-lg-12 col-xs-12 col-sm-12" id="contenedor-prov-cat-marcas">
              
            
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12" id="marca">

            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12" id="categoria">

            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12" id="subCategoria">

            </div>
            <div class="separador col-lg-12 mt"></div>
              <div class="text-center col-12 mt-5">
               <button type="submit" class="btn btn-primary center cargar_producto">Siguiente</button>
             </div>
             <input type="hidden" id="proveedor_id" name="proveedor_id">
            <input type="hidden" id="marca_id" name="marca_id">
            <input type="hidden" id="categoria_id" name="categoria_id"> 
      </form>
  </section>

@endsection
@section('js')
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
<script type="text/babel" src="{{asset('componentes/categorias-marcas-provedor.js')}}"></script>
<script type="text/babel">

//-- COMPONENTE DE CATEGORIA MARCA Y PROVEEDOR
    //LO SACO DEL PUBLIC/COMPONENTES/CATEGORIAS-MARCAS-PROVEDOR
            //NOTA PARA DESPUES: QUEDA MEJORARLO UN POCO Y PASARLO AL CREATE
var categoria_id=$("#select_categoria_id").val();
var producto_id=0;
class Componentecategoriamarcaprovedor extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      error: null,
      cid:producto_id,
      isLoaded: true,
      servidor:"../../../",
    };
  }
    render() {
      return (
           <div className="row">
                <div className="form-group col-lg-3 col-xs-12 col-sm-12" id="marca">
                    <Categoria />
                </div>
                {}
                <div className="form-group col-lg-3 col-xs-12 col-sm-12" id="marca">
                    <SubCategoria />
                </div>
                <div className="form-group col-lg-3 col-xs-12 col-sm-12" id="marca">
                    <Proveedor />
                </div>
                <div className="form-group col-lg-3 col-xs-12 col-sm-12" id="marca">
                    <Marcas />
                </div>
           </div>
      );
  }
}
ReactDOM.render(<Componentecategoriamarcaprovedor/>, document.getElementById("contenedor-prov-cat-marcas"))
//--------------------------------------------------------------------
   $('#form_carga_producto').on('submit', function(){
        
        jQuery("#proveedor_id").val(jQuery("#select_proveedor_id").val());
        jQuery("#categoria_id").val(jQuery("#select_categoria_id").val());
        jQuery("#marca_id").val(jQuery("#select_marca_id").val());
        
    });

</script>


@endsection