@extends('layouts.admin')
@section('title', 'Lita Autos')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de autos</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'automoviles.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('placa', null, ['class'=>'form-control', 'placeholder'=>'Buscar por placa...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('automoviles.create')}}" class="btn btn-primary"><i class="fa fa-briefcase"></i> Asignar auto </a>  </div>
            <table class="table table-hover">
              <thead>

                <td><strong>MARCA</strong></td>
                <td><strong>MODELO</strong></td>
                <td><strong>APARTAMENTO</strong></td>
                <td><strong>EDIFICIO</strong></td>
                <td><strong>ACCIONES</strong></td>

              </thead>
              <tbody>
                @foreach($autos as $carro)
                  <tr>
                    <td>{{$carro->marca->marca}}</td>
                    <td>{{$carro->modelo}}</td>
                    <td>{{$carro->apartamento->numero}}</td>
                    <td>{{$carro->apartamento->torre->nombre}}</td>
                    <td><a href="{{route('automoviles.edit',$carro->id)}}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
                {!! $autos->render()  !!}
              </div>

            </div>
          </div>

        @endsection
