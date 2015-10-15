@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'usuarios.store']) !!}

        @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
