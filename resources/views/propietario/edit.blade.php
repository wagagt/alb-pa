@extends('layouts.propietario')
@section('title', 'Editar usuario')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title col-md-12">Editar Perfil</h3>
          <div class="alert alert-warning col-md-12" style="margin-top:10px;">
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">x</button>
                    <i class="fa fa-exclamation-circle"></i> Todos los campos son obligatorios
                </div>
              <div class="box-tools">
                
              </div>
          </div>

          <div class="box-body">

            {!! Form::model($usuario, ['route'=>['propietario.update', $usuario->id],  'method' => 'PUT']) !!}
            <div class="row col-md-12">
                <div class="form-group">
                    <div class="col-md-3">
                        {!! Form::label('name', 'Nombres:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres del propietario', 'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        {!! Form::label('usuario', 'Usuario:') !!}
                        {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de usuario', 'disabled'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        {!! Form::label('email', 'Correo:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required'])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        {!! Form::label('pasaporte', 'Pasaporte:') !!}
                        {!! Form::text('pasaporte', null, ['class' => 'form-control', 'placeholder' => 'numero-pasaporte', 'required'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        {!! Form::label('cedula', 'Documento de Identificación:') !!}
                        {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'numero-documento-id', 'required'])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                      {!! Form::label('password', 'Contraseña:') !!}
                      {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => '**************',]) !!}
                    </div>
                </div>
                <div class="form-group" >
                    <div class="col-md-3">
                      {!! Form::label('confirm_password', 'Confirmar Contraseña:') !!}
                      {!! Form::password('confirm_password',  ['class' => 'form-control', 'placeholder' => '**************',]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12" style="padding-top:38px;">
                        {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
           </div>
      </div>
          {!! Form::close()!!}
  </div>
</div>
@endsection
@section('scripts')
    <script>
       $(document).ready(function(){
           $('#getDocuments').css('display','none');
           var password = document.getElementById("password")
                   , confirm_password = document.getElementById("confirm_password");
           function validatePassword(){
               if(password.value != confirm_password.value) {
                   confirm_password.setCustomValidity("Contraseñas no coinciden");
               } else {
                   confirm_password.setCustomValidity('');
               }
           }
           password.onchange = validatePassword;
           confirm_password.onkeyup = validatePassword;
       })

    </script>
@endsection