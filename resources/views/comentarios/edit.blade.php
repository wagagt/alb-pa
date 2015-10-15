@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($comentarios, ['route' => ['comentarios.update', $comentarios->id], 'method' => 'patch']) !!}

        @include('comentarios.fields')

    {!! Form::close() !!}
</div>
@endsection
