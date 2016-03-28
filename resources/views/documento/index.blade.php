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

                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Documento...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
               <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('documento.create')}}" class="btn btn-primary"><i class="fa fa-briefcase"></i> Crear Documentos </a>  </div>
        
        <table class="table table-hover">
            <thead>
                <td><strong>NOMBRE</strong></td>
                <td><strong>TIPO DOC.</strong></td>
                <td><strong>DESDE</strong></td>
                <td><strong>HASTA</strong></td>
                <td><strong>CREADO POR</strong></td>
                <td><strong>ACCIONES</strong></td>
            </thead>
            <tbody>
                @foreach($documentos as $value)
                <tr>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->tipo_documentos_id}}</td>
                    <td>{{$value->fecha_del}}</td>
                    <td>{{$value->fecha_al}}</td>
                    <td>{{$value->user_id}}</td>
                    <td>
                        <td>
                    <a href="{{ route('documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a> 
                    <a href="{{ route('documento.destroy', $value->id) }}"
                      class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                      <i class="fa fa-trash"></i>
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
