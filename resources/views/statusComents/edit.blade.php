@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit status_coments</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($statusComents, ['route' => ['statusComents.update', $statusComents->id], 'method' => 'patch']) !!}

            @include('statusComents.fields')

            {!! Form::close() !!}
        </div>
@endsection