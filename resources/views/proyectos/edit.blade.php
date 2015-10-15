@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch']) !!}

        @include('proyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
