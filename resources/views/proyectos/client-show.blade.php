@extends('layout.client')

@section('content')
<div class="container">
     <h3>  Detalle de proyecto: {!! $proyecto->nombre !!}</h3>
    <div>
        @include('proyectos.show-fields')
    </div>
</div>
<div class="container">
    <h3>  Avances</h3>
    <div>
        @include('proyectos.show-comentarios')
    </div>
</div>
@endsection


	