@extends('layouts.admin')
@section('title', 'Oficinas Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Marcas Vehículos</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'marca-vehiculo.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('marca', null, ['class'=>'form-control', 'placeholder'=>'Buscar Marca...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('marca-vehiculo.create')}}" class="btn btn-primary"><i class="fa fa-briefcase"></i> Crear Marca </a>  </div>
            <table class="table table-hover">
              <thead>

                <td><strong>MARCA</strong></td>
                <td><strong>ACCIONES</strong></td>

              </thead>
              <tbody>
                @foreach($marcas as $marca)
                  <tr>

                    <td>{{$marca->marca}}</td>
                    <td><a href="{{ route('marca-vehiculo.edit', $marca->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a> <a href="{{ route('marca-vehiculo.destroy', $marca->id) }}"
                        class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                        <i class="fa fa-trash"></i></a></td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
                {!! $marcas->render()  !!}
              </div>

            </div>
          </div>

        @endsection
