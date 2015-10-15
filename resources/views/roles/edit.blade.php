@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($roles, ['route' => ['roles.update', $roles->id], 'method' => 'patch']) !!}

        @include('roles.fields')

    {!! Form::close() !!}
</div>
@endsection
