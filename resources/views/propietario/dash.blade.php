@extends('layouts.propietario')
@section('title', 'Bienvenido Propietario')
@section('content')
  <div class="col-xs-12">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title"><i>Building Magement</i></h3>

      </div>

      <div class="box-body">

        Bienvenido: <b><i>{{Auth::user()->name}}</i></b>
      </div>



    </div>
  </div>
@endsection
