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
        <!-- Optionally, you can add icons to the links -->

        <li>
          <a href="/propietario/torre/{{\Auth::user()->getTorre()}}/documentos">
              <i class="fa fa-building-o"/></i><span>Documentos</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.auth.logout')}}">
              <i class="fa fa-sign-out"/></i> <span>Salir</span>
          </a>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
