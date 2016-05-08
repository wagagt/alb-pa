@extends('layouts.admin')
@section('title', 'Torre Apartamentos ')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Apartamentos</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'apartamento.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Buscar Apartamento...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>
      <div class="box-body">
        <div class="col-md-3 text-left"><a href="{{route('apartamento.create')}}" class="btn btn-primary"><i class="fa fa-building-o"></i> Crear Apartamento </a>  </div>
        <div class="col-md-1 text-left"> </div>
          <div class="col-md-3 text-left"><a href="{{route('torre.index')}}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar </a>  </div>
            <table class="table table-hover">
                <thead>

                    <th>NUMERO</th>
                    <th>NIVEL</th>
                    <th>METROS CUADRADOS</th>
                    <th>TORRE</th>
                    <th>PROPIETARIO</th>
                    <th>ACCIONES</th>
                </thead>
                <tbody>
                    @foreach($apartamentos as $apartamento)

                    <tr>

                        <td>{{$apartamento->numero}}</td>
                        <td>{{$apartamento->nivel}}</td>
                        <td>{{$apartamento->metros_cuadrados}}</td>
                        <td>{{$apartamento->torre->nombre}}</td>
                        <td>{{$apartamento->user->name}}</td>
                      <td>

                              <a href="{{ route('apartamento.edit', $apartamento->id) }}" class="btn btn-warning" title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                              <a href="{{ route('apartamento.destroy', $apartamento->id) }}" class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                                <i class="fa fa-trash"></i></a>
                      </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $apartamentos->render() !!}

          </div>

        </div>
      </div>

  @endsection
