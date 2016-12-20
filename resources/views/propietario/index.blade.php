@extends('layouts.propietario')
@section('title', 'Bienvenido Propietario')
@section('content')
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title">Propietario INDEX</h3>
            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px">
                    <input type="text" placeholder="Buscar" name="search_table" class="form-control">
                    <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            Dashboard Propietario DOCUMENTOS 
        </div>



    </div>
</div>
@endsection
