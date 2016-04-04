@extends('layouts.admin')
@section('title', 'Crear oficina')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar marca</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ route('marca-vehiculo.index') }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Listar Maracas</a>
            </div>

            <div class="row col-md-12">
                {!! Form::model($marca,['route'=>['marca-vehiculo.update', $marca->id], 'method' => 'PUT']) !!}
                <div class="form-gorup">
                    <div class="col-md-6">
                        {!! Form::label('marca', 'Nombre:') !!}
                        {!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una marca', 'required'])!!}
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
