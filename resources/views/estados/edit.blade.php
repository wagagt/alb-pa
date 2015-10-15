@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($estados, ['route' => ['estados.update', $estados->id], 'method' => 'patch']) !!}

        @include('estados.fields')

    {!! Form::close() !!}
</div>
@endsection
