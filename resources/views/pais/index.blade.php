@extends('layouts.admin')
@section('title', 'Países Lista')
@section('content')
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Lista de países</h3>
        <div class="box-tools">

          <!-- Buscador de Tags -->
          <div class="input-group input-group-sm">
            {!! Form::open(['route'=>'pais.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
            <div class="input-group">

              {!! Form::text('pais', null, ['class'=>'form-control', 'placeholder'=>'Buscar País...',
                'aria-describedby'=>'search','autofocus']) !!}
                <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
              </div>

              {!! Form::close() !!}
            </div>
            <!-- Fin del buscador -->
          </div>
        </div>

        <div class="box-body">
          <div class="col-md-12 text-left"><a href="{{route('pais.create')}}" class="btn btn-primary"><i class="fa fa-flag"></i>  CREAR PAIS </a>  </div>
          <table class="table table-hover">
            <thead>

              <td><strong>PAIS</strong></td>
              <td><strong>CIUDAD</strong></td>
              <td><strong>ACCIONES</strong></td>

            </thead>
            <tbody>
              @foreach($paises as $pais)
                <tr>
                  <td>{{$pais->pais}}</td>
                  <td>{{$pais->ciudad}}</td>
                  <td><a href="{{ route('pais.edit', $pais->id) }}" class="btn btn-warning" title="Editar">
                    <i class="fa fa-pencil-square-o"></i></a> <a href="{{ route('pais.destroy', $pais->id) }}"
                      class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                      <i class="fa fa-trash"></i></a></td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
              {!! $paises->render()  !!}
            </div>

          </div>
        </div>
@endsection
