
<div class="row">
		<div class="span5">
		    {!! $comentarios->render() !!}
            <table class="table table-striped table-condensed">
                  <thead>
                
                  <tr>
                      <th>Fecha</th>
                      <th>Avance</th>
                      <th>Horas</th>
                      <th>Comentario</th>                                          
                  </tr>
              </thead>   
              <tbody>
                @foreach($comentarios as $comentario)
                <tr>
                    <td>{{$comentario->created_at}}</td>
                    <td>{{$comentario->avance}}</td>
                    <td>{{$comentario->horas}}</td>
                    <td><textarea rows="2" cols="50">{{$comentario->comentario}}</textarea></td>                                       
                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $comentarios->render() !!}
            </div>
	</div>
	