@extends('layouts.errors.base-errors')
@section('title', 'Error 404')
@section('content')

    <div class="box-body container-fluid">
        <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 style="font-size:8em;">404</h1>
            <h2>Oops!! lo sentimos pagina no encontrada</h2>

            <a href="{{URL::previous()}}" class="btn btn-warning"><i class="fa fa-chevron-left"></i> Regresar</a>
        </div>

    </div>

@endsection