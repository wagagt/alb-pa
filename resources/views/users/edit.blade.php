@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($userdata, ['route' => ['users.update', $userdata->id], 'method' => 'patch']) !!}

        @include('users.fields')

    {!! Form::close() !!}
</div>
@endsection
