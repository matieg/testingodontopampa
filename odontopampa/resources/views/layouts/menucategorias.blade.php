
@foreach(\App\Categoria_producto::all() as $categoria)
    <li class="menu-item">
        <a class="menu-boton dropdown-toggle " id="{{$categoria->nombre}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="" title="">{{$categoria->nombre}}</a>
        <div class="dropdown-menu" aria-labelledby="{{$categoria->nombre}}">
            @foreach($categoria->subcategoria_producto() as $subcategoria)
                <a class="dropdown-item" href="#">{{$subcategoria->nombre}}</a>
            @endforeach
        </div>
    </li>
@endforeach
<li class="menu-item" id="" >
    <a class="menu-boton dropdown-toggle" id="menumarcas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="">
        Marcas
    </a>
    <div class="dropdown-menu" aria-labelledby="menumarcas">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here asd asd as d</a>
    </div>
</li>