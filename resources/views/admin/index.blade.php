@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title"><i>Building Magement</i></h3>
            <!--div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px">
                    <input type="text" placeholder="Buscar" name="search_table" class="form-control">
                    <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                    </div>
                </div>
            </div-->
        </div>

        <div class="box-body">
            Bienvenido: <b><i>{{Auth::user()->name}}</i></b>
        </div>



    </div>
</div>
@endsection
