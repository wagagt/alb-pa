@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'bitacoras.store']) !!}

        @include('bitacoras.fields')

    {!! Form::close() !!}
</div>
@endsection
