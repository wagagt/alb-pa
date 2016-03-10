@extends('layouts.admin')
@section('title', 'Crear Apartamento')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear Apartamento</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('apartamento.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Apartamento</a>
            </div>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'apartamento.store', 'method' => 'POST']) !!}
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
                        {!! Form::label('marca_v_1', 'Marca Vehículo 1:') !!}
                        {!! Form::text('marca_v_1', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: BMW', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('modelo_v_1', 'Modelo Vehículo 1:') !!}
                        {!! Form::text('modelo_v_1', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 2014', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('Placa_v_1', 'Placa Vehículo 1:') !!}
                        {!! Form::text('Placa_v_1', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: PR 2365', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('marca_v_2', 'Marca Vehículo 2:') !!}
                        {!! Form::text('marca_v_2', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: BMW', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('modelo_v_2', 'Modelo Vehículo 2:') !!}
                        {!! Form::text('modelo_v_2', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: 2014', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('Placa_v_2', 'Placa Vehículo 2:') !!}
                        {!! Form::text('Placa_v_2', null, ['class' => 'form-control', 'placeholder' => 'Ejemplo: PR 2365', 'required'])!!}
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
                    {!! Form::submit('Registrar',  ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close()!!}

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
