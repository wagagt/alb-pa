@extends('layouts.admin')
@section('title','Listado de Cxc')
@section('content')

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Crear Documento</h3>
                <div class="box-tools">

                </div>
            </div>

            <div class="box-body">
                <div class="text-left">
                    <a href="{{ URL::previous() }}" class="btn btn-primary"><i class="fa fa-th-list"></i>
                        Lista de CXC</a>
                </div>
                <br>

                <div class="row col-md-12 container-fluid">
                    {!! Form::open(['route'=>'cxc.store', 'method' => 'POST']) !!}
                    @include('cxc.fields')
                    {!! Form::close()!!}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')

@endsection

