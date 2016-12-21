<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceso denegado</title>
    <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/bootstrap/css/font-awesome.min.css')}}" media="screen" title="no title" charset="utf-8">
</head>
<body>
<div class="text-center">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                @include('flash::message')
                <div class="panel-title">Página no encontrada</div>
            </div>
            <div class="panel-body">
                <img class="img-responsive center-block" src="{{asset('images/secure.png')}}"></div>
            <hr/>
            <strong class="text-center">
                <p class="text-center"> Oops!! lo sentimos la pagina no ha sido encontrada</p>
                <p>  <a href="{{ route('admin.auth.login')}}" class="btn btn-warning"><i class="fa fa-times"></i> volver al inicio</a></p>
            </strong>

        </div>
    </div>

</div>

</body>
</html>
