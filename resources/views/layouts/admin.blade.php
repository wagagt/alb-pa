<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
      @yield('title', 'defacult')
  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      @include('admin.partials.links')


</head>
<!--

|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<div class="wrapper">

@include('admin.partials.header')

@include('admin.partials.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>@include('flash::message')</small>
        <small>@include('admin.partials.errors')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Control Principal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

          @yield('content')

      </div>

    </section>
    <!-- /.content -->
  </div>


  @include('admin.partials.footer')

  @include('admin.partials.aside-r')

  <div class="control-sidebar-bg"></div>
</div>
@include('admin.partials.js')
</body>
</html>
