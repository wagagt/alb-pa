@extends('layouts.login')
@section('title', 'Login')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @include('admin.partials.errors')
        <small>@include('flash::message')</small>
        <div class="panel panel-default">

          <div class="panel-heading">Login</div>
         <div class="text-left container-fluid"><i> {{ date('d/m/Y H:i') }} </i></div>
          <div class="panel-body row container-fluid">



            {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group" style="padding-bottom:38px">
              <div class="col-md-4">
                {!! Form::label('usuario', 'Usuario:') !!}
              </div>
              <div class="col-md-8">
                {!! Form::text('usuario', null, [
                  'class'=>'form-control',
                  'placeholder'=>'Ingrese usuario asignado',
                  'value' => '{{ old("usuario") }}', 'autofocus', 'required']) !!}

              </div>
            </div>

            <div class="form-group" style="padding-bottom:38px">
              <div class="col-md-4">
                {!! Form::label('password', 'Contraseña:') !!}
              </div>

              <div class="col-md-8">
                {!! Form::password('password', [
                  'class'=>'form-control',
                  'placeholder'=>'**********', 'autofocus', 'required']) !!}

              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                {!! link_to('password/email', $title = '¿Olvidó su contraseña?', $attributes = null, $secure = null) !!}
              </div>
              <div class="col-md-8">
                {!! Form::submit('Ingresar',['class' => 'btn btn-primary']) !!}
              </div>
            </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
