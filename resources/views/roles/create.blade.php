@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'roles.store']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
