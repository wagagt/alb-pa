<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Oficina</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Oficina</h1>
            <form method = 'get' action = 'http://localhost:8000/oficina'>
                <button class = 'btn blue'>Oficina Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>nombre : </i></b>
                        </td>
                        <td>{{$oficina->nombre}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>telefono : </i></b>
                        </td>
                        <td>{{$oficina->telefono}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>direccion : </i></b>
                        </td>
                        <td>{{$oficina->direccion}}</td>
                    </tr>
                    

                                                
                        
                        <tr>
                        <td>
                            <b><i>pais : </i><b>
                        </td>
                        <td>{{$oficina->paise->pais}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>ciudad : </i><b>
                        </td>
                        <td>{{$oficina->paise->ciudad}}</td>
                        </tr>
                        
                        
                        
                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
