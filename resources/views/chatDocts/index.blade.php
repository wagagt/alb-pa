@extends('layouts.admin')
@section('title', '')

@section('content')
	<div class="col-xs-12">
		<div class="box box-primary">
		<div class="box-header">
          <h3 class="box-title">Historial de todos los mensajes</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'chatDocts.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('placa', null, ['class'=>'form-control', 'placeholder'=>'Buscar por placa...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>
          <div class="box-body">
          <div class="col-md-12 text-left"><a href="{{route('chatDocts.create')}}" class="btn btn-primary">
          <i class="fa fa-briefcase"></i> Nuevo Chat </a>  </div>





	        <div class="clearfix"></div>

	        @include('flash::message')

	        <div class="clearfix"></div>

	        @include('chatDocts.table')
	    </div>
	</div>

@endsection