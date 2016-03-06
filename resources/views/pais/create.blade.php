@extends('layouts.admin')
@section('title', 'Crear usuarios')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear País</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('pais.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista Países</a>
            </div>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'pais.store', 'method' => 'POST']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('País', 'Nombres:') !!}
                        {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del país', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('ciudad', 'Ciudad:') !!}
                        {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la ciudad', 'required'])!!}
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
