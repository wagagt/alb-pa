@extends('layouts.propietario')
@section('title', 'Archivos x Documentos Lista')
@section('content')
<div class="col-xs-12">
<div class="box box-primary"> </div>
    <div class="box-header">
      <div class="box-tools">
            <div class="col-md-3 text-left"><a href="/propietario/torre/{{$documento->torre->id}}/{{$documento->tipo_documento->id}}/documentos" class="btn btn-primary"><i class="fa fa-list-alt" aria-hidden="true"></i> Volver </a>
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
                      <?php 
                      //dd($archivos);
                      if( empty($archivos)) {
                          echo "<h3>No se han ingresado documentos...</h3>";
                        }else{?>

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
                              <a href="/uploads/{{$value->nombre}}" target="popup" onclick="window.open('/uploads/{{$value->nombre}}','name','width=800,height=600')">
                                <h2><i class="fa fa-eye fa-6" aria-hidden="true"></i></h2>
                              </a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <?php }?>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--<div class="panel panel-default">-->
        <!--    <div class="panel-heading">-->
        <!--        <h4 class="panel-title">-->
        <!--            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Comentarios sobre el documento:</a>-->
        <!--        </h4>-->
        <!--    </div>-->
        <!--    <div id="collapseThree" class="panel-collapse collapse">-->
        <!--        <div class="panel-body">-->
                <!--<img src="{{asset('ui/images/underconstruction.gif')}}" width="280" height="160" >-->

        <!--           <div class="box-body box-chat">-->
        <!--                <div class="col-md-2"> <h4>Administradores</h4></div>-->
        <!--                <div class="col-md-6"> <h4>Mensajes</h4> </div>-->
        <!--                <div class="col-md-4"> <h4>Enviar mensajes</h4> </div>-->

        <!--                <div class="col-md-2" id="users">-->
        <!--                  @foreach($usuarios as $usuario)-->
        <!--                  <div class="box-chat col-xs-12 ">-->
        <!--                    <a href="#" title="{{$usuario->name}}" id="chat_{{$documento->id}}_{{$usuario->id}}" >-->
        <!--                      <div class="col-xs-4 chat-icon">-->
        <!--                        <i class="fa fa-user fa-1" aria-hidden="true"></i>-->
        <!--                      </div>-->
        <!--                    </a>-->
        <!--                       <span data-toggle="tooltip" title="" class="badge bg-yellow"  -->
        <!--                       id="mensajeNuevo_{{$usuario->id}}" data-original-title=""></span>-->

        <!--                    <div class="col-xs-8 chat-font" id="chat_{{$usuario->id}}">{{$usuario->usuario}}</div>-->
        <!--                  </div>-->
        <!--                  @endforeach-->
        <!--                </div>-->
                        
        <!--                      <div class="col-md-6 text-center" id="chats">-->
        <!--                      </div>-->
                        
        <!--                <div class="col-md-4">-->
        <!--                  <div id="compositor">-->
        <!--                    <input type="hidden" name="user_send" value="{{ Auth::user()->id }}" id="user_send">-->
        <!--                    <input type="hidden" name="user_recibe" value= "" id="user_recibe"> -->
        <!--                    <input type="hidden" name="_token" value=" {{ csrf_token() }}" id="token">-->
        <!--                    <input type="hidden" name= "docto_id" value ="{{ $documento->id }}" id="docto_id">-->
        <!--                    <input type="hidden" name= "activeChatId" value ="" id="activeChatId">-->
        <!--                    {!! Form::textarea('compositor', null, ['class' => 'compositor form-control', 'autocomplete' => 'off', 'size' => '30x5']) !!}-->
        <!--                  </div>-->
        <!--                  [ENTER] para enviar.xxxx-->
        <!--                </div>-->
        <!--              </div> -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-comment-o" aria-hidden="true"></i> Comentarios sobre el documento:</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="box-body box-chat">
                        <div class="col-md-3"> <h5>Administradores</h5></div>
                        <div class="col-md-5"> <h5>Mensajes</h5> </div>
                        <div class="col-md-4"> <h5>Enviar a:</h5> <div id="enviarA"></div> </div>

                        <div class="col-md-3" id="users">
                          @foreach($usuarios as $usuario)
                          <?php 
                            //echo "id------".$usuario->id;
                            $haveChat = (in_array($usuario->id, $arrayChats, true)) ? '<i class="fa fa-comment-o" aria-hidden="true"></i>' : "";
                          ?>
                          <div class="box-chat col-xs-12 alb-table">
                            <div class="alb-row">
                              <div class="alb-left-cell">  
                                <a href="#" title="{{$usuario->name}}" id="chat_{{$documento->id}}_{{$usuario->id}}_{{ Auth::user()->id }}" >
                                  <div class="col-xs-4 chat-icon" id="userChatIcon_{{$usuario->id}}">
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
                        </div>
                        <div class="col-md-4">
                          <p style="display:table-cell;">Mínimo 5 caracteres.</p>
                        
                          <span class="input-group-btn">
                            <button type="submit" id="sendMessage" name="sendMessage" class="btn btn-success btn-flat right">Enviar</button>
                          </span>
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
<script type="text/javascript" src="{{ asset('ui/js/chat_propietario.js')}}"></script>
@endsection
