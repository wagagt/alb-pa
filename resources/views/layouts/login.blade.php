<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>@yield('title','default')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('admin.partials.links')

</head>
<body class="skin-blue">
        <div class="wrapper">
            @include('admin.partials.header-login')
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                    AREA PRIVADA
                    <small>Building Management </small>
                    </h1>
                    
                </section>
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            @include('admin.partials.footer')
        </div><!-- ./wrapper -->
 
        @include('admin.partials.js')
    </body>
</html>