@extends('layouts.admin')
@section('title', 'Tipos de Documentos Lista')
@section('content')
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Lista de Tipos de Documentos</h3>
        <div class="box-tools">

          <!-- Buscador de Tags -->
          <div class="input-group input-group-sm">
            {!! Form::open(['route'=>'tipo_documento.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
                <div class="input-group">
                  {!! Form::text('tipo_documento', null, ['class'=>'form-control', 'placeholder'=>'Buscar Tipo Documento...',
                    'aria-describedby'=>'search','autofocus']) !!}
                    <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                  </div>
              {!! Form::close() !!}
            </div>
            <!-- Fin del buscador -->
          </div>
        </div>

        <div class="box-body">
              <div class="col-md-12 text-left"><a href="{{route('tipo_documento.create')}}" class="btn btn-primary"><i class="fa fa-flag"></i>  CREAR TIPO DOCUMENTO </a>
              </div>

            <table class="table table-hover">
                <thead>
                    <th>descripcion</th>
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($tipo_documentos as $value)
                    <tr>
                        <td>{{$value->descripcion}}</td>
                        <td>
                            <a href="{{ route('tipo_documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                            <a href="{{ route('tipo_documento.destroy', $value->id) }}" class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
              {!! $tipo_documentos->render()  !!}
            </div>
          </div>
        </div>
@endsection
