<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Archivos_documento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Archivos_documento</h1>
            <form method = 'get' action = 'http://alb.app:8000/archivos_documento'>
                <button class = 'btn blue'>Archivos_documento Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>id : </i></b>
                        </td>
                        <td>{{$archivos_documento->id}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>nombre : </i></b>
                        </td>
                        <td>{{$archivos_documento->nombre}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>tipo : </i></b>
                        </td>
                        <td>{{$archivos_documento->tipo}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>activo : </i></b>
                        </td>
                        <td>{{$archivos_documento->activo}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>documentos_id : </i></b>
                        </td>
                        <td>{{$archivos_documento->documentos_id}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
