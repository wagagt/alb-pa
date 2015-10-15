@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($usuarios, ['route' => ['usuarios.update', $usuarios->id], 'method' => 'patch']) !!}

        @include('usuarios.fields')

    {!! Form::close() !!}
</div>
@endsection
