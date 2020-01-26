@extends('admin.layouts.panel')
@section('titulo_panel', 'Nuevo producto')
@section('body_panel')
  <section class="container">
      <form action="/admin/producto/guardaredit" method="post" accept-charset="utf-8" class="col-lg-12 row form_editar_producto">
        @csrf()
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de producto" value="{{$producto->nombre}}">
            </div>
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="nombre">Descripcion</label>
              <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion de producto">{{$producto->descripcion}}</textarea>
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Cantidad</label>
              <input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad de producto" value="{{$producto->cantidad}}">
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Precio de compra</label>
              <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio de compra" value="{{$producto->precio_compra}}">
            </div>
            <div class="form-group col-lg-4 col-xs-12 col-sm-12">
              <label for="nombre">Precio de venta</label>
              <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio de venta" value="{{$producto->precio_venta}}">
            </div>
            <div class="separador col-lg-12 mt-4 mb-4"></div>
            <div class="form-group col-lg-12 col-xs-12 col-sm-12" id="contenedor-prov-cat-marcas">
              
            
            </div>
            <div class="separador col-lg-12 mt-4 mb-4"></div>
              <div class="text-center col-12 row">
                <div class="col-lg-3">
                    <label class="m-2">Estado: </label>
                </div>
                <select class="form-control col-lg-8" class="publicado" name="publicado">
                  @if($producto->publicado=="si")
                  <option selected value="{{$producto->publicado}}">Publicado</option>
                  <option value="no">No publicado</option>
                  @else
                  <option selected value="{{$producto->publicado}}">No publicado</option>
                  <option value="si">Publicado</option>
                  @endif
                </select>
             </div>

            <input type="hidden" id="proveedor_id" name="proveedor_id">
            <input type="hidden" id="marca_id" name="marca_id">
            <input type="hidden" id="categoria_id" name="categoria_id"> 
      </form>
  </section>
    <div class="separador mt-5 mb-5"></div>
    <div class="dialog-carga" style="display:none;"></div>
    <section class="container">
      <form method="post" accept-charset="utf-8" class="col-lg-12 row" enctype="multipart-form-data" id="form_carga_img">
               @csrf()
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="exampleInputFile">Galeria de imagenes</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="img_galeria" class="custom-file-input" id="img_galeria">
                  <label class="custom-file-label" for="exampleInputFile">Buscar</label>
                </div>

              </div>
            </div>
            <div class="post mt-5">
               <div class="user-block">
                 <label class="">Vista de Imagenes cargadas</label>
               </div>
               <!-- /.user-block -->
               <div class="row mb-3">
                 <!-- /.col -->
                 <div class="col-sm-12" id="galeria">
    
                   <!-- /.row -->
                 </div>
                 <!-- /.col -->
               </div>
                      <!-- /.row -->
            </div>
            <div class="separador col-lg-12 mt-4 mb-4"></div>
              <div class="text-center col-12">
               <input type="button" class="btn btn-success center editar" value="Guardar cambios"/>
             </div>
      </form>
  </section>
@endsection
@section('js')
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script type="text/babel" src="{{asset('componentes/categorias-marcas-provedor.js')}}"></script>
<script type="text/babel" src="{{asset('componentes/galeria_imagenes.js')}}"></script>
<script type="text/babel">
//---------------- ESTO ES LA GALERIA CON REACT--------------------------
  var producto_id={{$producto->id}};
  var categoria_producto_id={{$producto->categoria_producto_id}};
  var proveedor_producto_id={{$producto->proveedor_id}};
  var marca_producto_id={{$producto->marca_id}};
  $('#img_galeria').on("change", function(){
    if($('#img_galeria').val()!=""){
      jQuery('.dialog-carga').css('display', 'block');
      var formData = new FormData(document.getElementById('form_carga_img'));
      formData.append('producto_id', producto_id);
        jQuery.ajax({
          type:"POST",
          contentType:false,
          processData:false,
          data:formData,
          url:"/admin/subirimg",
          dataType:'json',
            success:function(r){
              if(r.success==true){
                jQuery('.dialog-carga').css('display', 'none');
              //render de react para dibujar las imagenes
              $('#img_galeria').val("");
              ReactDOM.render(<Galeria/>, document.getElementById("galeria"))
              }
            }
        })
    }
  });
    
//esta parte muestra las imagenes con react
  class Galeria extends React.Component{
    constructor(props){
      super(props);
      this.state = {
        cid:producto_id,
      };
    }
      render(){
        return (
             <div className="row">
                <GaleriaImagenes />
             </div>
        );
      }
  }
  ReactDOM.render(<Galeria/>, document.getElementById("galeria"))
//---------------- FIN DE LA GALERIA CON REACT--------------------------

//-- COMPONENTE DE CATEGORIA MARCA Y PROVEEDOR
    //LO SACO DEL PUBLIC/COMPONENTES/CATEGORIAS-MARCAS-PROVEDOR
            //NOTA PARA DESPUES: QUEDA MEJORARLO UN POCO Y PASARLO AL CREATE
  class Componentecategoriamarcaprovedor extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        error: null,
        cid:producto_id,
        isLoaded: true,
        servidor:"../../../",
        categoria_producto_id:categoria_producto_id,
        proveedor_producto_id:proveedor_producto_id,
        marca_producto_id:marca_producto_id,
      };
    }
      render() {
        return (
             <div className="row">
                  <div className="form-group col-lg-4 col-xs-12 col-sm-12" id="marca">
                      <Proveedor proveedor_producto_id={this.state.proveedor_producto_id} />
                  </div>
                  <div className="form-group col-lg-4 col-xs-12 col-sm-12" id="marca">
                      <Categoria categoria_producto_id={this.state.categoria_producto_id} />
                  </div>
                  <div className="form-group col-lg-4 col-xs-12 col-sm-12" id="marca">
                      <Marcas marca_producto_id={this.state.marca_producto_id} />
                  </div>
             </div>
        );
    }
  }
  ReactDOM.render(<Componentecategoriamarcaprovedor/>, document.getElementById("contenedor-prov-cat-marcas"))
//--------------------------------------------------------------------
  jQuery('.editar').on('click', function(){
      jQuery("#proveedor_id").val(jQuery("#select_proveedor_id").val());
      jQuery("#categoria_id").val(jQuery("#select_categoria_id").val());
      jQuery("#marca_id").val(jQuery("#select_marca_id").val());
      jQuery('.form_editar_producto').submit();
  });
</script>

@endsection