@extends('layouts.admin')
@section('title', 'Editar Documento')
@section('content')
  <div class="col-xs-12">
      <div class="box box-primary">
          <div class="box-header">
          <h3 class="box-title">Editar Documento</h3>
              <div class="box-tools">

              </div>
          </div>

          <div class="box-body">
            <div class="text-left">
            <a href="{{ $previousUrl }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
              Lista de Documentos</a>
            </div>
        <br>

            <div class="row col-md-12">
                {!! Form::model($documento, ['route'=>['documento.update', $documento->id], 'method' => 'PUT']) !!}
                    @include('documento.fields2')
                {!! Form::close()!!}
            </div>
            </div>

          </div>
</div>

@endsection
@section('scripts')
    <script type="text/javascript">

        $(document).ready(function(){

            $( function() {
                $( '.dpk_date_del' ).datepicker({
                    dateFormat: "dd/mm/yy",

                    dayNamesMin: [ "Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab" ]
                });
                $( '.dpk_date_al' ).datepicker({
                    dateFormat: "dd/mm/yy",

                    dayNamesMin: [ "Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab" ]
                });

            } );

        });

    </script>
@endsection
