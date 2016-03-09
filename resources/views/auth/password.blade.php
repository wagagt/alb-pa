@extends('layouts.login')
@section('title', 'Recuperar contraseña')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Restablecer contraseña</div>

          <div class="panel-body">
            <div class="col-md-12">
                <p>Ingrese su correo electrónico para restablecer</p>
            </div>
            @include('admin.partials.errors')
            {!! Form::open(['url' => 'password/email']) !!}
            <div class="form-group" style="padding-bottom:38px">
              <div class="col-md-4">
                {!! Form::label('email', 'Correo:') !!}
              </div>
              <div class="col-md-4">
                {!! Form::email('email', null, [
                  'class'=>'form-control'])!!}

                </div>
              </div>

                <div class="form-group">

                  <div class="col-md-8">
                    {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}
                  </div>

                </div>


                {!! Form::close() !!}




              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection
