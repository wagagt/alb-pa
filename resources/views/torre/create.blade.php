@extends('layouts.admin')
@section('title', 'Crear edificio')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear edificio</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('torre.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar torres</a>
            </div>

            <div class="row col-md-12">
                {!! Form::open(['route'=>'torre.store', 'method' => 'POST']) !!}
                <div class="form-gorup">
                    <div class="col-md-4">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del edificio', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-4">
                        {!! Form::label('direccion', 'Dirección:') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese dirección del edificio', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-4">
                        {!! Form::label('torre_numero', 'Correlativo Edificio:') !!}
                        {!! Form::text('torre_numero', null, ['class' => 'form-control', 'placeholder' => 'Numeración interna', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('niveles', 'Niveles:') !!}
                        {!! Form::text('niveles', null, ['class' => 'form-control', 'placeholder' => 'ejemplo: 15'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('oficina_id', 'País:') !!}
                        {!! Form::select('oficina_id', $oficinas , null, ['class' => 'form-control select-office', 'placeholder' => 'Seleccione una oficina', 'required'])!!}
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

         $('.select-office').chosen({
            no_results_text:'Ningún resultado coincide con: '
          });


      </script>
@endsection
