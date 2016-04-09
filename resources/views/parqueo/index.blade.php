@extends('layouts.admin')
@section('title', 'Oficinas Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Parqueos</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'parqueo.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Buscar numero parqueo...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('parqueo.create')}}" class="btn btn-primary"><i class="fa fa-briefcase"></i> Crear Parqueo </a>  </div>
            <table class="table table-hover">
              <thead>

                    <th>Número de parqueo</th>
                    <th>Apartamento</th>
                    <th>Edificio</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($parqueos as $parqueo)
                    <tr>
                        <td>{{$parqueo->numero}}</td>
                        <td>{{$parqueo->apartamento->numero}}</td>
                        <td>{{$parqueo->apartamento->torre->nombre}} </td>
                        <td><a href="{{ route('parqueo.edit',  $parqueo->id) }}" class="btn btn-warning" title="Editar">
                          <i class="fa fa-pencil-square-o"></i></a></td>
                    </tr>

                        @endforeach
                      </tbody>
                    </table>
                    {!! $parqueos->render()  !!}
                  </div>

                </div>
              </div>

            @endsection
