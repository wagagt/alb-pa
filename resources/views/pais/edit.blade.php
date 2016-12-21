@extends('layouts.admin')
@section('title', 'Editar país')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar país</h3>
              <div class="box-tools">
              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('pais.store') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista usuarios</a>
            </div>

            <div class="row col-md-12">
                {!! Form::model($pais, ['route'=>['pais.update', $pais->id],  'method' => 'PUT']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('pais', 'País:') !!}
                        {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres del propietario', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('ciudad', 'Usuario:') !!}
                        {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de usuario', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                  <br/>
                  <div class="col-md-12">
                    {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close()!!}
          </div>

      </div>
  </div>
  </div>

@endsection
