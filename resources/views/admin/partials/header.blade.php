<!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="/admin/home" class="logo">
          <span class="logo-mini"><img src="{{asset('/ui/images/logo-min.png')}}"></span>
      <span class="logo-lg"> <img src="{{asset('/ui/images/logo-b2.png')}}"><b>Administración</b> - </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success" id="unreadCount"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header" id="unreadCountText"></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                  <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;" id="unreadLinks">
                  <!-- start message -->
                
                  <!-- end message -->
                </ul>
                <div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 69px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 131.148px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
              </li>
              <li class="footer"><a href="#">Click para ir al mensaje...</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="user-image" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
                <!--<a style="color:white" href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Perfil</a>-->
                <p>
                  {{Auth::user()->name}} - {{Auth::user()->tipo}}<br>
                  <small>Miembro desde:  {{ Auth::user()->created_at->format('d/m/Y') }}</small>
                  
                </p>
                
              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{route('admin.auth.logout')}}" class="btn btn-danger">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar" style="display:none;"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
    <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id}}">
  </header>

@section('scripts')
<script type="text/javascript" src="{{ asset('ui/js/notifications.js' )}}"></script>
@endsection