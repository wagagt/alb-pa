<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Apartamento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Apartamento</h1>
            <form method = 'get' action = 'http://localhost:8000/apartamento'>
                <button class = 'btn blue'>Apartamento Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/apartamento'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="numero" name = "numero" type="text" class="validate">
                    <label for="numero">numero</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="nivel" name = "nivel" type="text" class="validate">
                    <label for="nivel">nivel</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="cantidad_banios" name = "cantidad_banios" type="text" class="validate">
                    <label for="cantidad_banios">cantidad_banios</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="metros_cuadrados" name = "metros_cuadrados" type="text" class="validate">
                    <label for="metros_cuadrados">metros_cuadrados</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="ambientes" name = "ambientes" type="text" class="validate">
                    <label for="ambientes">ambientes</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="dormitorios" name = "dormitorios" type="text" class="validate">
                    <label for="dormitorios">dormitorios</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="marca_v_1" name = "marca_v_1" type="text" class="validate">
                    <label for="marca_v_1">marca_v_1</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="modelo_v_1" name = "modelo_v_1" type="text" class="validate">
                    <label for="modelo_v_1">modelo_v_1</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="placa_v_1" name = "placa_v_1" type="text" class="validate">
                    <label for="placa_v_1">placa_v_1</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="marca_v_2" name = "marca_v_2" type="text" class="validate">
                    <label for="marca_v_2">marca_v_2</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="modelo_v_2" name = "modelo_v_2" type="text" class="validate">
                    <label for="modelo_v_2">modelo_v_2</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="placa_v_2" name = "placa_v_2" type="text" class="validate">
                    <label for="placa_v_2">placa_v_2</label>
                </div>
                
                
                <div class="input-field col s12">
                    <select name = 'torre_id'>
                        @foreach($torres as $key1 => $value1)
                        <option value="{{$key1}}">{{$value1}}</option>
                        @endforeach
                    </select>
                    <label>torres Select</label>
                </div>
                
                <button class = 'btn red' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script type="text/javascript">
    $('select').material_select();
    </script>
</html>
