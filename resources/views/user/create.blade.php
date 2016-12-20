@extends('layouts.admin')
@section('title', 'Crear usuarios')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear Usuario</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('users.store') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista usuarios</a>
            </div>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'users.store', 'method' => 'POST']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('name', 'Nombres:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres del propietario', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('usuario', 'Usuario:') !!}
                        {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de usuario', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('email', 'Correo:') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('pasaporte', 'Pasaporte:') !!}
                        {!! Form::text('pasaporte', null, ['class' => 'form-control', 'placeholder' => '1266363NBS135', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('cedula', 'Cédula:') !!}
                        {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => '2546091930203', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                      {!! Form::label('password', 'Contraseña') !!}
                      {!! Form::password('password',  ['class' => 'form-control', 'placeholder' => '**************',]) !!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('tipo', 'Tipo de usuario:') !!}
                        {!! Form::select('tipo', ['propietario' => 'Propietario', 'admin' => 'Administrador', 'super_admin' => 'Super Administrador'], null,
                            ['class' => 'form-control', 'placehodler' => 'Seleecione una opción',  'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('status', 'Estatus del usuario:') !!}
                        {!! Form::select('status', ['0' => 'Inactivo', '1' => 'Activo'], null,
                            ['class' => 'form-control', 'placehodler' => 'Seleecione una opción',  'required'])!!}
                    </div>
                </div>



                <div class="form-gorup">
                  <div class="col-md-12">
                    {!! Form::submit('Registrar',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close()!!}

          </div>
      </div>
  </div>
</div>

@endsection
