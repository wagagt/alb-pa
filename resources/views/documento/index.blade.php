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
                <td><strong>tIPO DOC.</strong></td>
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
                        <div class = 'row'>
                            <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/documento/{{$value->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                            <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/documento/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                            <a href = '#' class = 'viewShow btn-floating orange' data-link = '/documento/{{$value->id}}'><i class = 'material-icons'>info</i></a>
                        </div>
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
