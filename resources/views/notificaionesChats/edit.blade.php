@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit notificaionesChat</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($notificaionesChat, ['route' => ['notificaionesChats.update', $notificaionesChat->id], 'method' => 'patch']) !!}

            @include('notificaionesChats.fields')

            {!! Form::close() !!}
        </div>
@endsection