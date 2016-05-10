@extends('layouts.admin')
@section('title', 'Archivos x Documentos Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Archivos x Documento</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'archivos_documento.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">
                {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Buscar ArchivoxDocumento...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>
                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->
            </div>
          </div>
          <br>
          <div class="box-body" style="background: #e6e6ff;">
            {!! Form::open(array('route'=>'archivos_documento.store','method'=>'POST', 'files'=>true)) !!}
            <div class="col-md-6 text-left">
              {!! Form::file('archivo', null, ['class'=>'input-group-addon']) !!}
            </div>
            <div class="col-md-6 text-left"><a href="{{route('apartamento.create')}}" >
            </a>
          </div>
          <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Subir Archivo </button>
          <input type="hidden" name="documento_id" id="documento_id" value="<?php echo $documento->id;?>">
          {!! Form::close() !!}
        </div>
        <div class="col-md-3 text-left"><a href="{{ route('torre.documentos', $documento->torre->id) }}" class="btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista documentos </a>  </div>
        <hr>

        <!-- DOCUMENTO -->


        <div class="box-body">
          <div class="row col-md-6">

            <h4>Nombre: <strong>{{$documento->nombre}}</strong></h4>
          </div>


          <div class="row col-md-6">
            <h4>Tipo de Documento: {{$documento->tipo_documento->descripcion}}</h4>
            <!-- ->descripcion -->
          </div>

          <div class="row col-md-6">
            <h4>Desde: {{ $documento->fecha_del }}</h4>
          </div>

          <div class="row col-md-6">
            <h4>Hasta: {{$documento->fecha_al}}</h4>
          </div>

          <div class="row col-md-6">
            <h4>Edificio: {{$documento->torre->nombre}}</h4>
          </div>
        </div>

        <hr>
        <div class="box-body">
          <div class="col-md-4">    <h3>Usuarios con chats</h3></div>
          <div class="col-md-4"> <h3>Ultimos chats</h3> </div>
          <div class="col-md-4"> <h3>Enviar mensaje</h3> </div>

          <div class="col-md-3" id="users">
            <div class="row box box-success">
              <div class="box-body col-xs-12 ">
                <div class="col-xs-4 icon-size"><i class="fa fa-user" aria-hidden="true"></i> </div>
                <div class="col-xs-8"> {{Auth::user()->name}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-5" id="chats">
            <div class="row box box-primary">
              <div class="box-body col-xs-12 ">
                <div class="col-xs-4 icon-size"><i class="fa fa-user" aria-hidden="true"></i> </div>
                <div class="col-xs-8"> {{Auth::user()->name}}</div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <form class="" action="index.html" method="post" files="true">
              <textarea rows="3" cols="45" placeholder="Ingrese mensaje..." autofocus="true"></textarea>
              <button type="button" name="button" class="btn btn-primary">Enviar </button>
            </form>
          </div>


          <div class="col-md-12" >
            <!-- ARCHIVOS DEL DOCUMENTO -->
            <table class="table table-hover" >
              <thead>
                <th>id</th>
                <th>nombre</th>
                <th>tipo</th>
                <th>Acciones</th>
                <th>Visible

                  <form method = 'POST' action = '/archivos_documento/0/update'>
                    <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                    <a href="#" onclick="$(this).closest('form').submit()">
                      <i class="fa fa-eye-slash" aria-hidden="true"></i> Ocultar todos
                    </a>
                    <input type="hidden" name="documento_id" id="documento_id" value="<?php echo $documento->id;?>">
                  </form>
                </th>
              </thead>

              <tbody>
                @foreach($archivos as $value)
                  <?php
                  switch ($value->activo) {
                    case '1':
                    $buttonColor = 'success';
                    $icon        = '<i class="fa fa-check-circle" aria-hidden="true"></i>';
                    break;
                    case '0':
                    $buttonColor = 'danger';
                    $icon        = '<i class="fa fa-times-circle" aria-hidden="true"></i>';
                    break;
                  }

                  $updateActivo = $documento->id."_".$value->id;
                  ?>
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->nombre}}</td>
                    <td>{{$value->tipo}}</td>
                    <td>
                      <div class = 'row'>
                        <a href="{{ route('archivos_documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                          <i class="fa fa-pencil-square-o"></i></a>
                          <a href="{{ route('archivos_documento.destroy', $value->id) }}"
                            class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                            <i class="fa fa-trash"></i>
                          </a>
                        </div>
                      </td>
                      <td>
                        <form method = 'POST' action = '/archivos_documento/{{$value->id}}/update'>
                          <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                          <button type="submit" class="btn btn-<?php echo $buttonColor;?>"><?php echo $icon;
                          ?></button>
                          <input type="hidden" name="documento_id" id="documento_id" value="<?php echo $documento->id;?>">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>

    @endsection
