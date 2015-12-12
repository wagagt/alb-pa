@extends('layout.client')

@section('content')
<div class="container">
     <h3>  Detalle de proyecto: {!! $proyecto->nombre !!}</h3>
    <div>
        @include('proyectos.show-fields')
    </div>
</div>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading row-fluid ">
                    <h3>Avances</h3>
        </div>
        <br>
        <div class="col-md-6">
            @if ($isAdmin=="true")
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Agregar Comentarios
                </button>
            @endif
        </div>
        <div class="panel-body">
            <div>
                @include('proyectos.show-comentarios')
            </div>
        </div>
        <div class="panel-footer">
            Comentarios para proyecto:  {!! $proyecto->nombre !!}
        </div>
    </div>

    
</div>
@endsection


	