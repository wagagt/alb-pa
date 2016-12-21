@extends('layouts.admin')
@section('title', 'Oficinas Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de oficinas</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'oficina.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Oficina...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('oficina.create')}}" class="btn btn-primary"><i class="fa fa-briefcase"></i> Crear Oficinas </a>  </div>
            <table class="table table-hover">
              <thead>

                <td><strong>NOMBRE</strong></td>
                <td><strong>TELÉFONO</strong></td>
                <td><strong>DIRECCION</strong></td>
                <td><strong>PAIS</strong></td>
                <td><strong>ACCIONES</strong></td>

              </thead>
              <tbody>
                @foreach($oficinas as $oficina)
                  <tr>
                    <td>{{$oficina->nombre}}</td>
                    <td>{{$oficina->telefono}}</td>
                    <td>{{$oficina->direccion}}</td>
                    <td>{{$oficina->pais->pais}}</td>
                    <td><a href="{{ route('oficina.edit', $oficina->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a> <a href="{{ route('oficina.destroy', $oficina->id) }}"
                        class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                        <i class="fa fa-trash"></i></a></td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
                {!! $oficinas->render()  !!}
              </div>

            </div>
          </div>

        @endsection
