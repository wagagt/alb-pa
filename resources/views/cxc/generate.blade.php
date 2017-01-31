@extends('layouts.admin')
@section('title','Generación de cobros Cxc')
@section('content')

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Generación de cobros Cxc</h3>
                <div class="box-tools">

                </div>
            </div>

            <div class="box-body">
                <div class="col-md-12 text-left">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
                        Lista de CXC</a>
                </div>
                <br>

                <div class="row container-fluid">
                    <div class="col-md-12">
                        {!! Form::open(['route'=>'cxc.store', 'method' => 'POST']) !!}

                        {!! Form::close()!!}
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function(){

            $(function() {
                $('.dpk_date_ini, .dpk_date_fin').datepicker({

                    dateFormat: "dd/mm/yy",
                    dayNamesMin: [ "Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab" ],
                    monthNames:["Enero","Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]

                });
            } );

        });

    </script>

@endsection

