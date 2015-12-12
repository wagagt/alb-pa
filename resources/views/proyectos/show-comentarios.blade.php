
<div class="row-fluid">
		<div class="span12">
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
                    <td><textarea rows="2" cols="75">{{$comentario->comentario}}</textarea></td>                                       
                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $comentarios->render() !!}
            </div>
	</div>
	