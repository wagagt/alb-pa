 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
             <img src="{{asset('ui/images/avataruser.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <<li><a href="{{route('pais.index')}}"><i class="fa fa-flag"></i><span>Países</span></a>  </li>
        <li><a href="#"><i class="fa fa-building-o"/></i><span>Torres</span></a></li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"/></i> <span>Usuarios</span></a></li>
        <li><a href="#"><i class="fa fa-exclamation-triangle"/></i> <span>Notificación General</span></a></li>
        <li><a href="#"><i class="fa fa-commenting-o"/></i> <span>Notificación de Incidencias</span></a></li>
        <li><a href="#"><i class="fa fa-sign-out"/></i> <span>Salir</span></a></li>
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
