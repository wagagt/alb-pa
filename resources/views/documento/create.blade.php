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
            <a href="{{ $previousUrl }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista de Documentos</a>
            </div>
        <br>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'documento.store', 'method' => 'POST']) !!}
                    @include('documento.fields')
                {!! Form::close()!!}
            </div>
            </div>

          </div>
</div>
      </div>
      
  </div>
  </div>

@endsection
