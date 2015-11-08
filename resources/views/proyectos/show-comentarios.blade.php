
<div class="row">
		<div class="span5">
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
                    <td><textarea rows="4" cols="50">{{$comentario->comentario}}</textarea></td>                                       
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
	</div>
	
    <!--- Profundidad Field --->
    <div class="form-group col-sm-6 col-lg-4">
        Fecha:{{ $comentario->created_at }}, Avance:{{ $comentario->avance }}, Horas: {{ $comentario->horas }}<br>
        Comentario: {{ $comentario->comentario }}<hr>
    </div>
