@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clientes.store']) !!}

        @include('clientes.fields')

    {!! Form::close() !!}
</div>
@endsection
