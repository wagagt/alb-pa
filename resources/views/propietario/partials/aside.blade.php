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
          <p>{{Auth::user()->usuario}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
          <li class="header">MENÚ</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="treeview" id="getDocuments">
          <a href="#"><i class="fa fa-book"></i> <span>Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu" id="tiposDocumento">
            <!--Loaded from Ajax-->
          </ul>
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
  <input type="hidden" name="userTorreId" id="userTorreId" value="{{Auth::user()->getTorre()}}">
@section('scripts')
<script type="text/javascript" src="{{ asset('ui/js/layoutData.js' )}}"></script>
@endsection