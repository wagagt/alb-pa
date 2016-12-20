@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New documentos_chat</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'documentosChats.store']) !!}

            @include('documentosChats.fields')

        {!! Form::close() !!}
    </div>
@endsection