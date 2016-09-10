@extends('layouts.propietario')
@section('title', 'Inicio')
@section('content')
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title">Bienvenido</h3>
            <!--<div class="box-tools">-->
            <!--    <div class="input-group input-group-sm" style="width: 150px">-->
            <!--        <input type="text" placeholder="Buscar" name="search_table" class="form-control">-->
                    <!--<div class="input-group-btn">-->
                    <!--        <button class="btn btn-default" type="submit">-->
                    <!--            <i class="fa fa-search"></i>-->
                    <!--        </button>-->
                    <!--</div>-->
            <!--    </div>-->
            <!--</div>-->
        </div>

        <div class="box-body">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <H2>Avatar de: {{ $user->name }} .</H2>
            
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label> Subir imagen para perfil ( avatar ) </label>
                <input type="file" name ="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pul-right btn btn-sm btn-primary">
            </form>
            
        </div>



    </div>
</div>
@endsection
