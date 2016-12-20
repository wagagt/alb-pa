@extends('layouts.admin')
@section('title', 'Editar edificio')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar edificio</h3>
              <div class="box-tools">
              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('torre.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar edificios</a>
            </div>

            <div class="row col-md-12">
                {!! Form::model($torre, ['route'=>['torre.update', $torre->id],  'method' => 'PUT']) !!}
                <div class="row col-md-12">
                    <div class="form-gorup">
                        <div class="col-md-4">
                            {!! Form::label('nombre', 'Nombre:') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del edificio', 'required'])!!}
                        </div>
                    </div>
                  <div class="form-gorup">
                        <div class="col-md-4">
                            {!! Form::label('direccion', 'Dirección:') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección de la torre', 'required'])!!}
                        </div>
                    </div>

                    <div class="form-gorup">
                        <div class="col-md-4">
                            {!! Form::label('torre_numero', 'Correlativo Edificio:') !!}
                            {!! Form::text('torre_numero', null, ['class' => 'form-control', 'placeholder' => 'Numeración interna', 'required'])!!}
                        </div>

                    <div class="form-gorup">
                        <div class="col-md-6">
                            {!! Form::label('niveles', 'Niveles:') !!}
                            {!! Form::text('niveles', null, ['class' => 'form-control', 'placeholder' => 'ej: 25'])!!}
                        </div>
                    </div>
                    <div class="form-gorup">
                        <div class="col-md-6">
                            {!! Form::label('oficina_id', 'Oficina:') !!}
                            {!! Form::select('oficina_id', $oficinas , null, ['class' => 'form-control select-country', 'placeholder' => 'Seleccione una oficina', 'required'])!!}
                        </div>
                    </div>

                <div class="form-gorup">
                  <br/>
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

         $('.select-country').chosen({
            no_results_text:'Ningún resultado coincide con: '
          });


      </script>
@endsection
