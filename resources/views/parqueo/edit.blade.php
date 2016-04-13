@extends('layouts.admin')
@section('title', 'Crear oficina')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar Parqueo</h3>
              <div class="box-tools">

              </div>
          </div>
          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('parqueo.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Parqueos</a>
            </div>
            <div class="row col-md-12">
                {!! Form::model($parqueo,['route'=>['parqueo.update', $parqueo->id], 'method' => 'PUT']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('numero', 'Número:') !!}
                        {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Ingrese múmero de parqueo', 'required'])!!}
                    </div>
                </div>
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('apto_id', 'Apartamento:') !!}
                        {!! Form::select('apto_id', $aptos , null, ['class' => 'form-control select-apto', 'placeholder' => 'Seleccione un apartamento...', 'required'])!!}
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

           $('.select-apto').chosen({
              no_results_text:'Ningún resultado coincide con: '
            });


        </script>
  @endsection
