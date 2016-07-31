<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
             <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-circle" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
          <li class="header">Menú</li>
        @if((Auth::user()->tipo == 'admin')|| (Auth::user()->tipo == 'super_admin'))

        <!-- Optionally, you can add icons to the links -->
        <li class="treeview">
          <a href="#"><i class="fa fa-cogs"></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="{{route('pais.index')}}"><i class="fa fa-flag"></i><span>Países</span></a></li>
            <li><a href="{{route('oficina.index')}}"><i class="fa fa-briefcase"></i><span>Oficinas</span></a></li>
            <li><a href="{{route('apartamento.index')}}"><i class="fa fa-home"></i><span>Apartamentos</span></a></li>
            <li><a href="{{route('tipo_documento.index')}}"><i class="fa fa-book"></i><span>Tipo Documentos</span></a></li>
            <li><a href="{{route('marca-vehiculo.index')}}"><i class="fa fa-car"></i><span>Marcas de vehículos</span></a></li>
            <li><a href="{{route('parqueo.index')}}"><i class="fa fa-ticket"></i><span>Parqueos</span></a></li>
            <li><a href="{{route('automoviles.index')}}"><i class="fa fa-car"></i><i class="fa fa-home"></i><span>Autos Apartamentos</span></a></li>
          </ul>
        </li>
        <li><a href="{{route('torre.index')}}"><i class="fa fa-building-o"/></i><span>Edificios</span></a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"/></i> <span>Usuarios</span></a></li>
        <li><a href="#"><i class="fa fa-exclamation-triangle"/></i> <span>Notificación General</span></a></li>
        <li><a href="#"><i class="fa fa-commenting-o"/></i> <span>Notificación de Incidencias</span></a></li>
        <li><a href="{{route('admin.auth.logout')}}"><i class="fa fa-sign-out"/></i> <span>Salir</span></a></li>
      @else
        <li><a href="{{route('admin.auth.logout')}}"><i class="fa fa-sign-out"/></i> <span>Salir</span></a></li>
      @endif

        <!--li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li-->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
