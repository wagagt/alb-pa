<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Marca_vehiculo</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Marca_vehiculo</h1>
            <form method = 'get' action = 'http://localhost:8000/marca_vehiculo'>
                <button class = 'btn blue'>Marca_vehiculo Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/marca_vehiculo/{{$marca_vehiculo->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="marca" name = "marca" type="text" class="validate" value="{{$marca_vehiculo->marca}}">
                    <label for="marca">marca</label>
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
