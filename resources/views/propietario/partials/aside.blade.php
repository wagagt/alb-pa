<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
             <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-circle" alt="{{Auth::user()->usuario}}" title="{{Auth::user()->name}}">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>


      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
          <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->

        <li id="getDocuments"><a href="/propietario/torre/{{\Auth::user()->getTorre()}}/documentos" ><i class="fa fa-building-o"/></i><span>Documentos</span></a></li>



        <li><a href="{{route('admin.auth.logout')}}"><i class="fa fa-sign-out"/></i> <span>Salir</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
