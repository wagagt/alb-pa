@extends('layouts.admin')
@section('title', 'Documentos Lista')
@section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Documentos</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'documento.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Buscar Documento...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>
        <div class="box-body">
          <div class="col-md-3 text-left"><a href="/propietario/torre/{{\Auth::user()->getTorre()}}/documentos" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar </a>  </div>
        <table class="table table-hover">
            <thead>
                <td><strong>NOMBRE</strong></td>
                <td><strong>TIPO DOC.</strong></td>
                <td><strong>DESDE</strong></td>
                <td><strong>HASTA</strong></td>
                <td><strong>EDIFICIO</strong></td>
                <td><strong>VER DOCTOS.</strong></td>
            </thead>
            <tbody>
                @foreach($documentos as $value)
                <tr>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->tipo_documento->descripcion}}</td>
                    <td>{{$value->fecha_del}}</td>
                    <td>{{$value->fecha_al}}</td>
                    <td>{{$value->torre->nombre}}</td>
                    <td>
                      <!-- <a href="documento/{{$value->id}}/archivos_documento" -->
                    <a href="{{ route('propDocumento.archivos', $value->id) }}"
                      class="btn btn-success" title="VER DOCUMENTOS">
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                  </td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
     {!! $documentos->render()  !!}
              </div>

            </div>
          </div>

 @endsection
