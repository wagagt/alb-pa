@extends('layouts.admin')
@section('title', 'Crear torre')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Crear torre</h3>
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
                    <div class="col-md-6">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la torre', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('direccion', 'Dirección:') !!}
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Indese direccion de la torre', 'required'])!!}
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
