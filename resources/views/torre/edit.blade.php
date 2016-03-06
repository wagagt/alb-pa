@extends('layouts.admin')
@section('title', 'Editar torre')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar torre</h3>
              <div class="box-tools">
              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('torre.store') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar torres</a>
            </div>

            <div class="row col-md-12">
                {!! Form::model($torre, ['route'=>['torre.update', $torre->id],  'method' => 'PUT']) !!}
                <div class="row col-md-12">
                    {!! Form::open(['route'=>'torre.store', 'method' => 'POST']) !!}
                    <div class="form-gorup">
                        <div class="col-md-6">
                            {!! Form::label('nombre', 'Nombre:') !!}
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la torre', 'required'])!!}
                        </div>
                    </div>
                  <div class="form-gorup">
                        <div class="col-md-6">
                            {!! Form::label('direccion', 'Dirección:') !!}
                            {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la dirección de la torre', 'required'])!!}
                        </div>
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
