@extends('layouts.admin')
@section('title', 'Crear usuarios')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear Oficina</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('oficina.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Oficinas</a>
            </div>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'oficina.store', 'method' => 'POST']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la oficina', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('telefono', 'Teléfono:') !!}
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'use el siguiente formato (222-2222)', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('direccion', 'Dirección:') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección de la oficina', 'required'])!!}
                    </div>
                </div>

                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('pais_id', 'País:') !!}
                        {!! Form::select('pais_id', $paises , null, ['class' => 'form-control select-country', 'placeholder' => 'Seleccione un país', 'required'])!!}
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

         $('.select-country').chosen({
            no_results_text:'Ningún resultado coincide con: '
          });


      </script>
@endsection
