<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Archivos_documento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Archivos_documento</h1>
            <form method = 'get' action = 'http://alb.app:8000/archivos_documento'>
                <button class = 'btn blue'>Archivos_documento Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://alb.app:8000/archivos_documento/{{$archivos_documento->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="id" name = "id" type="text" class="validate" value="{{$archivos_documento->id}}">
                    <label for="id">id</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="nombre" name = "nombre" type="text" class="validate" value="{{$archivos_documento->nombre}}">
                    <label for="nombre">nombre</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="tipo" name = "tipo" type="text" class="validate" value="{{$archivos_documento->tipo}}">
                    <label for="tipo">tipo</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="activo" name = "activo" type="text" class="validate" value="{{$archivos_documento->activo}}">
                    <label for="activo">activo</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="documentos_id" name = "documentos_id" type="text" class="validate" value="{{$archivos_documento->documentos_id}}">
                    <label for="documentos_id">documentos_id</label>
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
