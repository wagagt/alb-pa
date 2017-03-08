@extends('layouts.admin')
@section('title','Listado de Cxc')
@section('content')
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Lista de CXC generadas <sub><b><i>(Puede realizar filtro por: Nombre, Monto, Recurrencia, Edificio y Status)</i> </b></sub></h3>
                <div class="col-md-12 text-left">

                    <a href="{{route('cxc.create')}}" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-credit-card"></i>  CREAR CXC </a>
                </div>
            </div>

            <div class=" container-fluid">
                <div class="box-body table-responsive">


                    <table id="users-table" class="table table-bordered table-hover">
                        <thead style="display: table-header-group;">
                            <th><strong>NOMBRE</strong></th>
                            <th><strong>MONTO</strong></th>
                            <th><strong>RECURRENCIA</strong></th>
                            <th><strong>FECHA INICIO</strong></th>
                            <th><strong>FECHA FIN</strong></th>
                            <th><strong>STATUS</strong></th>
                            <th><strong>ACCIONES</strong></th>
                        </thead>
                        
                        @foreach($cobros as $cobro)
                        <tr>
                            <th><strong>{{$cobro->nombre}}</strong></th>
                            <th><strong>{{$cobro->monto}}</strong></th>
                            <th><strong>{{$cobro->recurrencia}}</strong></th>
                            <th><strong>{{$cobro->fecha_inicio_cobro}}</strong></th>
                            <th><strong>{{$cobro->fecha_fin_cobro}}</strong></th>
                            <th><strong>{{$cobro->status}}</strong></th>
                            <th><strong>
                                <a href="" class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                                <i class="fa fa-trash"></i></a>
                                
                                <a href="" class="btn btn-success" title="Detalle" >
                                <i class="fa fa-users"></i></a>
                                
                                <a href="" class="btn btn-warning" title="Editar">
                                <i class="fa fa-pencil-square-o"></i></a>
                                
                                </strong>
                            </th>
                        </tr>
                        @endforeach
                        
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

@endsection