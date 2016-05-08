@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New status_coments</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'statusComents.store']) !!}

            @include('statusComents.fields')

        {!! Form::close() !!}
    </div>
@endsection