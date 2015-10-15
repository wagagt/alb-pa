@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'comentarios.store']) !!}

        @include('comentarios.fields')

    {!! Form::close() !!}
</div>
@endsection
