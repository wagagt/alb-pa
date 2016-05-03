@extends('layouts.admin')
@section('title', 'Torres Listado')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Torres</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'torre.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Buscar Torre...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('torre.create')}}" class="btn btn-primary"><i class="fa fa-building-o"></i> Agregar Torre </a>  </div>
            <table class="table table-hover">
              <thead>

                <th><strong>NOMBRE</strong></th>
                <th><strong>NIVELES</strong></th>
                <th><strong>OFICINA</strong></th>
                <th><strong>DOCUMENTOS</strong>
                <td><strong>ACCIONES</strong></td>

              </thead>
              <tbody>
                @foreach($torres as $torre)
                  <tr>
                    <td>{{$torre->nombre}}</td>
                    <td>{{$torre->niveles}}</td>
                    <td>{{$torre->oficina->nombre}}</td>
                    <td><a href="torre/{{$torre->id}}/documentos">{{$torre->documentos->count()}}</a></td>
                    <td>
                      <a href="{{ route('apartamento.Torres', $torre->id) }}"
                        class="btn btn-info" title="Apartamentos"><i class="fa fa-building-o"></i></a>
                      <a href="{{ route('torre.edit', $torre->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a>
                      <a href="{{ route('torre.destroy', $torre->id) }}"
                        class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                        <i class="fa fa-trash"></i></a>

                      </td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
                {!! $torres->render()  !!}
              </div>

            </div>
          </div>

        @endsection
