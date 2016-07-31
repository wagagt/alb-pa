@extends('layouts.propietario')
@section('title', 'Editar usuario')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar Perfil</h3>
              <div class="box-tools">
              </div>
          </div>

          <div class="box-body">

            {!! Form::model($usuario, ['route'=>['propietario.update', $usuario->id],  'method' => 'POST']) !!}
            <div class="row col-md-12">
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('name', 'Nombres:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres del propietario', 'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('usuario', 'Usuario:') !!}
                        {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de usuario', 'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('email', 'Correo:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required'])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('pasaporte', 'Pasaporte:') !!}
                        {!! Form::text('pasaporte', null, ['class' => 'form-control', 'placeholder' => 'numero-pasaporte', 'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('cedula', 'Documento de Identificación:') !!}
                        {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'numero-documento-id', 'required'])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                      {!! Form::label('password', 'Contraseña') !!}
                      {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => '**************',]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                      {!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
                      {!! Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' => '**************',]) !!}
                    </div>
                </div>
          </div>
      </div>
          <div class="form-group">
              <div class="col-md-12">
                {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
                </div>
          </div>
          {!! Form::close()!!}
  </div>
</div>

@endsection
