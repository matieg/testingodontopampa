  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{asset('images/Odontopampa 1.png')}}" alt="Odontopampa" class="brand-image ">
      <span class="brand-text">Odontopampa  </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <i class="fa fa-user"></i>
        </div>
        <div class="info">
          @if(Auth::check())
            <a href="#" class="d-block">{{Auth::user()->nombre}}</a>
          @endif
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('/admin')}}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cubes"></i>
              <p>
                Productos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/productos')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/productos/create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ingresar Productos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-dollar"></i>
              <p>
                Pedidos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/pedidos')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Pedidos</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-truck"></i>
              <p>
                Proveedores
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/proveedores')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/proveedores/create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ingresar Proveedores</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/usuarios')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Usuarios registrados</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Categorías
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/categorias')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Categorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/categorias/create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ingresar Categorías</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Subcategorías
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/subcategorias')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Subategorías</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/subcategorias/create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ingresar Subategorías</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Marcas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/marcas')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ver Marcas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/marcas/create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ingresar Marcas</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
