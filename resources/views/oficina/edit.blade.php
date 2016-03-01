<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Oficina</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Oficina</h1>
            <form method = 'get' action = 'http://localhost:8000/oficina'>
                <button class = 'btn blue'>Oficina Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/oficina/{{$oficina->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="nombre" name = "nombre" type="text" class="validate" value="{{$oficina->nombre}}">
                    <label for="nombre">nombre</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="direccion" name = "direccion" type="text" class="validate" value="{{$oficina->direccion}}">
                    <label for="direccion">direccion</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="telefono" name = "telefono" type="text" class="validate" value="{{$oficina->telefono}}">
                    <label for="telefono">telefono</label>
                </div>
                                
                <div class="input-field col s12">
                    <select name = 'paise_id'>
                        @foreach($paises as $key1 => $value1)
                        <option value="{{$key1}}">{{$value1}}</option>
                        @endforeach
                    </select>
                    <label>paises Select</label>
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
