@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'clients.store']) !!}

        @include('clients.fields')

    {!! Form::close() !!}
</div>
@endsection
