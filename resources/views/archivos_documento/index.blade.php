<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Archivos_documento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Archivos_documento Index</h1>
            <div class="row">
            <form class = 'col s3' method = 'get' action = 'http://alb.app:8000/archivos_documento/create'>
                <button class = 'btn red' type = 'submit'>Create New Archivos_documento</button>
            </form>
                        </div>
            <table>
                <thead>
                    
                    <th>id</th>
                    
                    <th>nombre</th>
                    
                    <th>tipo</th>
                    
                    <th>activo</th>
                    
                    <th>documentos_id</th>
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($archivos_documentos as $value)

                    <tr>
                        
                        <td>{{$value->id}}</td>
                        
                        <td>{{$value->nombre}}</td>
                        
                        <td>{{$value->tipo}}</td>
                        
                        <td>{{$value->activo}}</td>
                        
                        <td>{{$value->documentos_id}}</td>
                        
                        
                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/archivos_documento/{{$value->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/archivos_documento/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/archivos_documento/{{$value->id}}'><i class = 'material-icons'>info</i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="modal1" class="modal">
            <div class = "row AjaxisModal">
            </div>
        </div>
    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script> var baseURL = "{{URL::to('/')}}"</script>
    <script type="text/javascript" src = "/js/AjaxisMaterialize.js"></script>
    <script type="text/javascript" src = "/js/scaffold-interface-js/customA.js"></script>
</html>
