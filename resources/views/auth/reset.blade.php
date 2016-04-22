@extends('layouts.login')
@section('title', 'Reiniciar contraseña')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Reiniciar contraseña</div>

          <div class="panel-body">
            @include('admin.partials.errors')
            <div class="col-md-12">
                <p>Ingrese su nueva contraseña</p>
            </div>

            {!! Form::open(['url' => '/password/reset']) !!}
            <div class="form-group" style="padding-bottom:60px">
              <div class="col-md-6">
                {!! Form::hidden('token', $token ,null) !!}
                {!! Form::label('email','Correo:') !!}
              </div>
              <div class="col-md-6" >
                {!! Form::email('email', null, [
                  'class'=>'form-control', 'autofocus'])!!}

                </div>
              </div>
              <div class="form-group" style="padding-bottom:38px">
                <div class="col-md-6">
                  {!! Form::label('password', 'Nueva contraseña:') !!}
                </div>

                <div class="col-md-6">
                  {!! Form::password('password', [
                    'class'=>'form-control',
                    'placeholder'=>'**********']) !!}

                  </div>
                </div>

                <div class="form-group" style="padding-bottom:38px">
                  <div class="col-md-6">
                    {!! Form::label('password_confirmation', 'Repita contraseña:') !!}
                  </div>

                  <div class="col-md-6">
                    {!! Form::password('password_confirmation', [
                      'class'=>'form-control',
                      'placeholder'=>'**********']) !!}

                    </div>
                  </div>

                <div class="form-group" >

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
