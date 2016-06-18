@extends('layouts.admin')
@section('title', 'Archivos x Documentos Lista')
@section('content')
<div class="col-xs-12">
<div class="box box-primary"> </div>
    <div class="box-header">
      <h3 class="box-title">Lista de Archivos x Documento</h3>
      <div class="box-tools">
            <div class="col-md-3 text-left"><a href="/propietario/documentos" class="btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista documentos </a>  
            </div>
      </div>
    </div>
  
  <hr>

<div class="bs-example">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <h4>Nombre: <strong>{{$documento->nombre}}</strong></h4></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="box-body">
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

                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Archivos asociados al documento:</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="box-body" style="background: #e6e6ff;">
                    <div class="col-md-12" >
                      <!-- ARCHIVOS DEL DOCUMENTO -->
                      <table class="table table-hover" >
                        <thead>
                          <th>Nombre</th>
                          <th>Ver</th>
                        </thead>

                        <tbody>
                          @foreach($archivos as $value)
                          <tr>
                            <td>{{$value->nombre}}</td>
                            <td>
                              <a href="/uploads/{{$value->nombre}}" target="_blank">
                                <h2><i class="fa fa-eye fa-6" aria-hidden="true"></i></h2>
                              </a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Comentarios sobre el documento:</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="box-body box-chat">
                        <div class="col-md-2"> <h4>Administradores</h4></div>
                        <div class="col-md-6"> <h4>Mensajes</h4> </div>
                        <div class="col-md-4"> <h4>Enviar mensajes</h4> </div>

                        <div class="col-md-2" id="users">
                          @foreach($usuarios as $usuario)
                          <div class="box-chat col-xs-12 ">
                            <a href="#" title="{{$usuario->name}}" id="chat_{{$documento->id}}_{{$usuario->id}}" >
                              <div class="col-xs-4 chat-icon">
                                <i class="fa fa-user fa-1" aria-hidden="true"></i>
                              </div>
                            </a>
                               <span data-toggle="tooltip" title="" class="badge bg-yellow"  
                               id="mensajeNuevo_{{$usuario->id}}" data-original-title=""></span>

                            <div class="col-xs-8 chat-font" id="chat_{{$usuario->id}}">{{$usuario->usuario}}</div>
                          </div>
                          @endforeach
                        </div>
                        
                              <div class="col-md-6 text-center" id="chats">
                              </div>
                        
                        <div class="col-md-4">
                          <div id="compositor">
                            <input type="hidden" name="user_send" value="{{ Auth::user()->id }}" id="user_send">
                            <input type="hidden" name="user_recibe" value= "" id="user_recibe"> 
                            <input type="hidden" name="_token" value=" {{ csrf_token() }}" id="token">
                            <input type="hidden" name= "docto_id" value ="{{ $documento->id }}" id="docto_id">
                            <input type="hidden" name= "activeChatId" value ="" id="activeChatId">
                            {!! Form::textarea('compositor', null, ['class' => 'compositor form-control', 'autocomplete' => 'off', 'size' => '30x5']) !!}
                          </div>
                          [ENTER] para enviar.xxxx
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
  <p id="notificacion"></p>
</div>

</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('ui/js/script.js')}}"></script>
@endsection
