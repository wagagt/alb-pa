@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'estados.store']) !!}

        @include('estados.fields')

    {!! Form::close() !!}
</div>
@endsection
