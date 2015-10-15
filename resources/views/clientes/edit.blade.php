@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($clientes, ['route' => ['clientes.update', $clientes->id], 'method' => 'patch']) !!}

        @include('clientes.fields')

    {!! Form::close() !!}
</div>
@endsection
