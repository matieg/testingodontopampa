@extends('admin.layouts.panel')
@section('titulo_panel', "Agregar imagenes al producto (".$producto->nombre.")")
@section('body_panel')
    <div class="dialog-carga" style="display:none;"></div>
    <section class="container">
      <form method="post" accept-charset="utf-8" class="col-lg-12 row" enctype="multipart-form-data" id="form_carga_img">
               @csrf()
            <div class="form-group col-lg-12 col-xs-12 col-sm-12">
              <label for="exampleInputFile">Agregar imagenes</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="img_galeria" class="custom-file-input" id="img_galeria">
                  <label class="custom-file-label" for="exampleInputFile">Buscar</label>
                </div>
                <div class="input-group-append">
                 {{--  <span class="input-group-text subir_img" id="">Subir</span> --}}
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
              <div class="text-center col-12">
               <a href="/admin/productos/publicar/{{$producto->id}}" class="btn btn-success center">Publicar</a>
               <a href="/admin/productos" class="btn btn-danger center">Salir sin publicar</a>
             </div>


      </form>
  </section>
@endsection
@section('js')
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
<script type="text/babel" src="{{asset('componentes/galeria_imagenes.js')}}"></script>
<script type="text/babel">

var producto_id={{$producto->id}};
   
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
  class Galeria extends React.Component {
    constructor(props){
      super(props);
      this.state = {
        cid:producto_id,
      };
    }
      render(){
        return (
             <div className="row">
                <GaleriaImagenes uso="edit"/>
             </div>
        );
    }
  }

ReactDOM.render(<Galeria/>, document.getElementById("galeria"))
</script>
@endsection