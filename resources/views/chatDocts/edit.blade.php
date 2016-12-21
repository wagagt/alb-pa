@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit chat_docts</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($chatDocts, ['route' => ['chatDocts.update', $chatDocts->id], 'method' => 'patch']) !!}

            @include('chatDocts.fields')

            {!! Form::close() !!}
        </div>
@endsection