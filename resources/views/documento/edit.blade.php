<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Documento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Documento</h1>
            <form method = 'get' action = 'http://alb.app:8000/documento'>
                <button class = 'btn blue'>Documento Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://alb.app:8000/documento/{{$documento->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="nombre" name = "nombre" type="text" class="validate" value="{{$documento->nombre}}">
                    <label for="nombre">nombre</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="tipo_documentos_id" name = "tipo_documentos_id" type="text" class="validate" value="{{$documento->tipo_documentos_id}}">
                    <label for="tipo_documentos_id">tipo_documentos_id</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="fecha_del" name = "fecha_del" type="text" class="validate" value="{{$documento->fecha_del}}">
                    <label for="fecha_del">fecha_del</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="fecha_al" name = "fecha_al" type="text" class="validate" value="{{$documento->fecha_al}}">
                    <label for="fecha_al">fecha_al</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="user_id" name = "user_id" type="text" class="validate" value="{{$documento->user_id}}">
                    <label for="user_id">user_id</label>
                </div>
                                
                <button class = 'btn red' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script type="text/javascript">
    $('select').material_select();
    </script>
</html>
