<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/propietario/home" class="logo">
          <span class="logo-mini responsive"><img src="{{asset('/ui/images/logo-min.png')}}"></span>

      <span class="logo-lg"> <img src="{{asset('/ui/images/logo-b2.png')}}"><b>Propietario</b> - </span>
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
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            
            <ul class="dropdown-menu">
              <li class="header">tiene 9 tareas</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
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
                <!--<a style="color:white" href="{{ url('/propietario/profile') }}"><i class="fa fa-btn fa-user"></i>Perfil</a>-->

                <p>
                  {{Auth::user()->name}} - {{Auth::user()->tipo}}<br>
                  <small>Miembro desde:  {{Auth::user()->created_at->format('d/m/Y')}}</small>
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
  </header>
