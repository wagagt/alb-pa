@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit documentos_chat</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($documentosChat, ['route' => ['documentosChats.update', $documentosChat->id], 'method' => 'patch']) !!}

            @include('documentosChats.fields')

            {!! Form::close() !!}
        </div>
@endsection