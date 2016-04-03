<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Parqueo</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Parqueo</h1>
            <form method = 'get' action = 'http://localhost:8000/parqueo'>
                <button class = 'btn blue'>Parqueo Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/parqueo'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="numero" name = "numero" type="text" class="validate">
                    <label for="numero">numero</label>
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
