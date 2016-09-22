@extends('layouts.admin')
@section('title', 'Documentos Lista')
@section('content')
<div class="col-xs-12">
  <div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Lista de Documentos en torre: <strong>{{$torre->nombre}}</strong></h3>
      <div class="box-tools">

        <!-- Buscador de Tags -->
        <div class="input-group input-group-sm">
          {!! Form::open(['route'=>'documento.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
          <div class="input-group">

            {!! Form::text('numero', null, ['class'=>'form-control', 'placeholder'=>'Buscar Documento...',
            'aria-describedby'=>'search','autofocus']) !!}
            <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
          </div>

          {!! Form::close() !!}
        </div>
        <!-- Fin del buscador -->
      </div>
    </div>
    <div class="box-body">
      <div class="col-md-3 text-left"><a href="{{route('documento.create')}}" class="btn btn-primary"><i class="fa fa-file-o" aria-hidden="true"></i> Crear Documento </a>  </div>
      <div class="col-md-1 text-left"> </div>
      <div class="col-md-8 text-left"><a href="{{route('torre.index')}}" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar </a>  </div>

      <div class="col-md-12 col-xd-1 ">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#t1" data-toggle="tab" aria-expanded="true">Enero-Marzo</a></li>
            <li class=""><a href="#t2" data-toggle="tab" aria-expanded="false">Abril-Junio</a></li>
            <li class=""><a href="#t3" data-toggle="tab" aria-expanded="false">Julio-Septiembre</a></li>
            <li class=""><a href="#t4" data-toggle="tab" aria-expanded="false">Octubre-Diciembre</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Año <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2016</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">2017</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><2016</a></li>
              </ul>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="t1">
            @if ($trim1->total() != 0)
              <table class="table table-hover">
                <thead>
                  <td ><h5><strong>NOMBRE</strong></h5></td>
                  <td ><h5><strong>TIPO DOC.</strong></h5></td>
                  <td ><h5><strong>DESDE</strong></h5></td>
                  <td ><h5><strong>HASTA</strong></h5></td>
                  <td ><h5><strong>EDIFICIO</strong></h5></td>
                  <td ><h5><strong>ACCIONES</strong></h5></td>
                </thead>
                <tbody>
                  @foreach($trim1 as $value)
                  <tr>
                    <td>                
                      <a href="{{ route('documento.archivos', $value->id) }}" title="ver Archivos">
                        {{$value->nombre}}
                      </a>
                    </td>
                    <td >{{$value->tipo_documento->descripcion}}</td>
                    <td >{{$value->fecha_del}}</td>
                    <td >{{$value->fecha_al}}</td>
                    <td >{{$value->torre->nombre}}</td>
                    <td >
                      <a href="{{ route('documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                        <i class="fa fa-pencil-square-o"></i>
                      </a>
                      <a href="{{ route('documento.destroy', $value->id) }}"
                        class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                        <i class="fa fa-trash"></i>
                      </a>
                      <!-- <a href="documento/{--{$value->id}--}/archivos_documento" -->
                      <a href="{{ route('documento.archivos', $value->id) }}"
                        class="btn btn-success" title="ver Archivos">
                        <i class="fa fa-file-pdf-o"></i>
                      </a>
                    </td>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <h4>No hay documentos para Trimestre 1 </h4>
            @endif
          </div>

          <div class="tab-pane" id="t2">
          @if ($trim2->total() != 0)
            <table class="table table-hover">
              <thead>
                <td><h5><strong>NOMBRE</strong></h5></td>
                <td><h5><strong>TIPO DOC.</strong></h5></td>
                <td><h5><strong>DESDE</strong></h5></td>
                <td><h5><strong>HASTA</strong></h5></td>
                <td><h5><strong>EDIFICIO</strong></h5></td>
                <td><h5><strong>ACCIONES</strong></h5></td>
              </thead>
              <tbody>
                @foreach($trim2 as $value)
                <tr>
                  <td>                
                    <a href="{{ route('documento.archivos', $value->id) }}" title="ver Archivos">
                      {{$value->nombre}}
                    </a>
                  </td>
                  <td>{{$value->tipo_documento->descripcion}}</td>
                  <td>{{$value->fecha_del}}</td>
                  <td>{{$value->fecha_al}}</td>
                  <td>{{$value->torre->nombre}}</td>
                  <td>
                    <a href="{{ route('documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href="{{ route('documento.destroy', $value->id) }}"
                      class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                      <i class="fa fa-trash"></i>
                    </a>
                    <!-- <a href="documento/{--{$value->id}--}/archivos_documento" -->
                    <a href="{{ route('documento.archivos', $value->id) }}"
                      class="btn btn-success" title="ver Archivos">
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                  </td>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <h4>No hay documentos para Trimestre 2 </h4>
          @endif

        </div>
        <div class="tab-pane" id="t3">
        @if ($trim3->total() != 0)
          <table class="table table-hover">
            <thead>
              <td><h5><strong>NOMBRE</strong></h5></td>
              <td><h5><strong>TIPO DOC.</strong></h5></td>
              <td><h5><strong>DESDE</strong></h5></td>
              <td><h5><strong>HASTA</strong></h5></td>
              <td><h5><strong>EDIFICIO</strong></h5></td>
              <td><h5><strong>ACCIONES</strong></h5></td>
            </thead>
            <tbody>
              @foreach($trim3 as $value)
              <tr>
                <td>                
                <a href="{{ route('documento.archivos', $value->id) }}" title="ver Archivos">
                  {{$value->nombre}}
                </a>
                </td>
                <td>{{$value->tipo_documento->descripcion}}</td>
                <td>{{$value->fecha_del}}</td>
                <td>{{$value->fecha_al}}</td>
                <td>{{$value->torre->nombre}}</td>
                <td>
                  <a href="{{ route('documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                    <i class="fa fa-pencil-square-o"></i>
                  </a>
                  <a href="{{ route('documento.destroy', $value->id) }}"
                    class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                    <i class="fa fa-trash"></i>
                  </a>
                  <!-- <a href="documento/{--{$value->id}--}/archivos_documento" -->
                  <a href="{{ route('documento.archivos', $value->id) }}"
                    class="btn btn-success" title="ver Archivos">
                    <i class="fa fa-file-pdf-o"></i>
                  </a>
                </td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <h4>No hay documentos para Trimestre 3</h4>
        @endif

      </div>

      <div class="tab-pane" id="t4">
      @if ($trim4->total() != 0)
        <table class="table table-hover">
          <thead>
            <td><h5><strong>NOMBRE</strong></h5></td>
            <td><h5><strong>TIPO DOC.</strong></h5></td>
            <td><h5><strong>DESDE</strong></h5></td>
            <td><h5><strong>HASTA</strong></h5></td>
            <td><h5><strong>EDIFICIO</strong></h5></td>
            <td><h5><strong>ACCIONES</strong></h5></td>
          </thead>
          <tbody>
            @foreach($trim4 as $value)
            <tr>
              <td>                
                <a href="{{ route('documento.archivos', $value->id) }}" title="ver Archivos">
                  {{$value->nombre}}
                </a>
              </td>
              <td>{{$value->tipo_documento->descripcion}}</td>
              <td>{{$value->fecha_del}}</td>
              <td>{{$value->fecha_al}}</td>
              <td>{{$value->torre->nombre}}</td>
              <td>
                <a href="{{ route('documento.edit', $value->id) }}" class="btn btn-warning" title="Editar">
                  <i class="fa fa-pencil-square-o"></i>
                </a>
                <a href="{{ route('documento.destroy', $value->id) }}"
                  class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                  <i class="fa fa-trash"></i>
                </a>
                <!-- <a href="documento/{--{$value->id}--}/archivos_documento" -->
                <a href="{{ route('documento.archivos', $value->id) }}"
                  class="btn btn-success" title="ver Archivos">
                  <i class="fa fa-file-pdf-o"></i>
                </a>
              </td>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <h4>No hay documentos para Trimestre 4 </h4>
      @endif

    </div>
  </div>
</div>
</div>



</div>

</div>
</div>

@endsection
