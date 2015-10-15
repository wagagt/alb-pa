@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'proyectos.store']) !!}

        @include('proyectos.fields')

    {!! Form::close() !!}
</div>
@endsection
