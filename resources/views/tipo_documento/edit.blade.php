@extends('layouts.admin')
@section('title', 'Editar Tipo de Documento')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar Tipo de Documento</h3>
              <div class="box-tools">
              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('tipo_documento.store') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista de Tipos de Documento</a>
            </div>
<br>
            <div class="row col-md-12">
            {!! Form::model($tipo_documento, ['route'=>['tipo_documento.update', $tipo_documento->id],  'method' => 'PUT']) !!}

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('descripcion', 'Descripción:') !!}
                        {!! Form::text('descripcion', $tipo_documento->descripcion, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción', 'required'])!!}
                    </div>
                </div>
                 <div class="form-gorup">
                  <div class="col-md-12">
                    <br>
                    {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            {!! Form::close()!!}
       </div>
  </div>
  </div>

@endsection
