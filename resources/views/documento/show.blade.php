<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Documento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Documento</h1>
            <form method = 'get' action = 'http://alb.app:8000/documento'>
                <button class = 'btn blue'>Documento Index</button>
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
                        <td>{{$documento->nombre}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>tipo_documentos_id : </i></b>
                        </td>
                        <td>{{$documento->tipo_documentos_id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>fecha_del : </i></b>
                        </td>
                        <td>{{$documento->fecha_del}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>fecha_al : </i></b>
                        </td>
                        <td>{{$documento->fecha_al}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>user_id : </i></b>
                        </td>
                        <td>{{$documento->user_id}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
