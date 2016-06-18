@extends('layouts.admin')
@section('title', 'Archivos x Documentos Lista')
@section('content')
<div class="col-xs-12">
<div class="box box-primary"> </div>
    <div class="box-header">
      <h3 class="box-title">Lista de Archivos x Documento</h3>
      <div class="box-tools">
            <div class="col-md-3 text-left"><a href="{{ route('torre.documentos', $documento->torre->id) }}" class="btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i> Lista documentos </a>  
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
                  {!! Form::open(array('route'=>'archivos_documento.store','method'=>'POST', 'files'=>true)) !!}
                  <div class="box-body" style="background: #e6e6ff;">
                      <div class="col-md-6 text-left">
                        {!! Form::file('archivo', null, ['class'=>'input-group-addon']) !!}
                      </div>
                      <div class="col-md-6 text-left"><a href="{{route('apartamento.create')}}" >
                      </a>
                      </div>
                      <button class="btn btn-p  mary"><i class="fa fa-upload" aria-hidden="true"></i> Subir Archivo </button>
                      <input type="hidden" name="documento_id" id="documento_id" value="<?php echo $documento->id;?>">
                    {!! Form::close() !!}
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
                        <div class="col-md-3"> <h4>Inquilinos</h4></div>
                        <div class="col-md-5"> <h4>Mensajes</h4> </div>
                        <div class="col-md-4"> <h4>Enviar</h4> </div>

                        <div class="col-md-3" id="users">
                        <?php
                          $userChatActiveId = array_column($usersChatActive, 'user_send_id')
                        ?>
                          @foreach($usuarios as $usuario)
                          <?php 
                            $haveChat = (in_array($usuario->id, $userChatActiveId, true)) ? '<i class="fa fa-comment-o" aria-hidden="true"></i>' : "";
                          ?>
                          <div class="box-chat col-xs-12 alb-table">
                          <div class="alb-row">
                            <div class="alb-left-cell">  
                              <a href="#" title="{{$usuario->name}}" id="chat_{{$documento->id}}_{{$usuario->id}}" >
                                <div class="col-xs-4 chat-icon">
                                  <i class="fa fa-user fa-1" aria-hidden="true"><?php echo $haveChat;?></i>
                                </div>
                              </a>
                            </div>

                            <div class="alb-middle-cell">
                               <span data-toggle="tooltip" title="" class="badge bg-yellow"  
                               id="mensajeNuevo_{{$usuario->id}}" data-original-title=""></span>
                            </div>

                            <div class="alb-right-cell">
                              <div class="col-xs-8 chat-font" id="chat_{{$usuario->id}}">{{$usuario->usuario}} </div>
                            </div>

                          </div>  
                          </div>
                          @endforeach
                        </div>
                        
                              <div class="col-md-5 text-center" id="chats">
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
                          [ENTER] para enviar.
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
