@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($bitacora, ['route' => ['bitacoras.update', $bitacora->id], 'method' => 'patch']) !!}

        @include('bitacoras.fields')

    {!! Form::close() !!}
</div>
@endsection
