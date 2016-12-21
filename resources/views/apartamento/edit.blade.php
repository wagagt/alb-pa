@extends('layouts.admin')
@section('title', 'Editar Apartamento')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Editar Apartamento</h3>
          <div class="box-tools">

          </div>
        </div>

        <div class="box-body">
          <div class="text-left">
            <a href="{{ route('apartamento.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Apartamento</a>
            </div>

            <div class="row col-md-12">
              {!! Form::model($apartamento,['route'=>['apartamento.update', $apartamento->id], 'method' => 'PUT']) !!}
              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('numero', 'Número:') !!}
                  {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de apartamento', 'required'])!!}
                </div>
              </div>
              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('nivel', 'Nivel:') !!}
                  {!! Form::text('nivel', null, ['class' => 'form-control', 'placeholder' => 'Número de nivel', 'required'])!!}
                </div>
              </div>
              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('cantidad_banios', '# de Baños:') !!}
                  {!! Form::text('cantidad_banios', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 2', 'required'])!!}
                </div>
              </div>

              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('metros_cuadrados', 'Metros Cuadrados:') !!}
                  {!! Form::text('metros_cuadrados', null, ['class' => 'form-control select-country', 'placeholder' => 'Ejemplo: 600', 'required'])!!}
                </div>
              </div>

              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('ambientes', 'Ambientes:') !!}
                  {!! Form::text('ambientes', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 3', 'required'])!!}
                </div>
              </div>

              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('dormitorios', '# de Dormitorios:') !!}
                  {!! Form::text('dormitorios', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 4', 'required'])!!}
                </div>
              </div>
              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('torre_id', 'Torre:') !!}
                  {!! Form::select('torre_id', $torres , null, ['class' => 'form-control select-torre', 'placeholder' => 'Seleccione un Torre', 'required'])!!}
                </div>
              </div>

              <div class="form-gorup">
                <div class="col-md-6">
                  {!! Form::label('user_id', 'Propietario:') !!}
                  {!! Form::select('user_id', $users , null, ['class' => 'form-control select-user', 'placeholder' => 'Seleccione un Usuario', 'required'])!!}
                </div>
              </div>


              <div class="form-gorup">
                <div class="col-md-12">
                  {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
                </div>
              </div>
              {!! Form::close()!!}
            </div>
            <div class="col-md-12">
              <h3>Autos / Parqueos asignados</h3>
            </div>
            <div class="col-md-9">
              <table class="table table-hover">
                  <thead>
                    <th>MATRICULA</th>
                    <th>MODELO VEHICULO</th>
                    <th>ACCIONES</th>
                  </thead>
                  <tbody>
                      @foreach($autos as $carro)
                      <tr>
                        <td class="warning"> <strong><i>{{$carro->placa}}</i></strong></td>
                        <td class="warning"><strong><i>{{$carro->modelo}}</i></strong></td>
                        <td class="warning">
                          <a href="{{route('automoviles.edits',[$carro->id,  $apartamento->id])}}" class="btn btn-warning" title="Editar">
                            <i class="fa fa-pencil-square-o"></i></a>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <div class="col-md-3">
              <table class="table table-hover">
                  <thead>
                    <th>PARQUEOS ASIGNADOS</th>
                  </thead>
                  <tbody>
                      @foreach($parqueos as $parqueo)
                      <tr>
                        <td class="success"># <strong><i>{{$parqueo->numero}}</i></strong></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    @endsection

    @section('script')
      <script type="text/javascript">

      $('.select-user').chosen({
        no_results_text:'Ningún resultado coincide con: '
      });

      $('.select-torre').chosen({
        no_results_text:'Ningún resultado coincide con: '
      });


      </script>
    @endsection
