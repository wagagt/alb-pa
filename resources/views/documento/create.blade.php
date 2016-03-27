@extends('layouts.admin')
@section('title', 'Crear Documento')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear Documento</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('documento.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista de Documentos</a>
            </div>
        <br>

                    <div class="row col-md-12">
                {!! Form::open(['route'=>'documento.store', 'method' => 'POST']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('Nombre', 'Nombre:') !!}
                        {!! Form::text('documento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del documento', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('TipoDocumento', 'Tipo de Documento:') !!}
                        {!! Form::select('tipo_documento', $tipo_documentos_list, null, ['class' => 'form-control select-country', 'placeholder' => 'Seleccione un tipo de documento', 'required'])!!}

                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('fechadel', 'Fecha Desde:') !!}
                        {!! Form::text('documento', null, ['class' => 'form-control', 'placeholder' => 'Fecha Inicio', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('fechaal', 'Fecha Hasta:') !!}
                        {!! Form::text('tipodocumento', null, ['class' => 'form-control', 'placeholder' => 'Fecha Final', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                  <div class="col-md-12">
                    <br>
                    {!! Form::hidden('user_id', Auth::user()->id ,null) !!}
                    {!! Form::submit('Crear',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close()!!}

          </div>
</div>
      </div>
      
  </div>
  </div>

@endsection
