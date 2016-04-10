@extends('layouts.admin')
@section('title', 'Editar Autos')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar asignacion automoviles</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('automoviles.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Autos Asignados</a>
            </div>
            <div class="row col-md-12">
                {!! Form::model($auto, ['route'=>['automoviles.update', $auto->id], 'method' => 'PUT']) !!}
                <div class="form-gorup">
                    <div class="col-md-3">
                        {!! Form::label('modelo', 'Modelo:') !!}
                        {!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo del vehículo', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-3">
                        {!! Form::label('placa', 'Placa:') !!}
                        {!! Form::text('placa', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la placa del vehículo', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-3">
                        {!! Form::label('marca_id', 'Marca:') !!}
                        {!! Form::select('marca_id', $marcas , null, ['class' => 'form-control select-mark', 'placeholder' => 'Seleccione una marca', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-3">
                        {!! Form::label('apto_id', 'Apartamento Asignado:') !!}
                        {!! Form::select('apto_id', $aptos , null, ['class' => 'form-control select-apto', 'placeholder' => 'Asigne un apartamentos', 'required'])!!}
                    </div>
                </div>


                <div class="form-gorup">
                  <div class="col-md-12">
                    {!! Form::submit('Actualizar',  ['class' => 'btn btn-primary']) !!}
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

         $('.select-mark').chosen({
            no_results_text:'Ningún resultado coincide con: '
          });
          $('.select-apto').chosen({
             no_results_text:'Ningún resultado coincide con: '
           });


      </script>
@endsection
