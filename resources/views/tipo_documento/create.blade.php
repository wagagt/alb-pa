@extends('layouts.admin')
@section('title', 'Crear usuarios')
@section('content')

  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear Tipo de Documento</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('tipo_documento.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista de Tipos de Documento</a>
            </div>
<br>
            <div class="row col-md-12">
            {!! Form::open(['route'=>'tipo_documento.store', 'method' => 'POST']) !!}

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('País', 'Descripción:') !!}
                        {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('torre_id', 'Edificio:') !!}
                        {!! Form::select('torre_id', $torres , null, ['class' => 'form-control select-office', 'placeholder' => 'Seleccione un edificio', 'required'])!!}
                    </div>
                </div>
                 <div class="form-gorup">
                  <div class="col-md-12">
                    <br>
                    {!! Form::submit('Crear',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close()!!}
        </div>
      </div>
  </div>
  </div>

    
@endsection
