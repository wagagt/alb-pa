@foreach($comentarios as $comentario)
    <!--- Profundidad Field --->
    <div class="form-group col-sm-6 col-lg-4">
        Fecha:{{ $comentario->created_at }}, Avance:{{ $comentario->avance }}, Horas: {{ $comentario->horas }}<br>
        Comentario: {{ $comentario->comentario }}<hr>
    </div>
@endforeach