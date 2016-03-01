<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Oficina</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Oficina Index</h1>
            <div class="row">
            <form class = 'col s3' method = 'get' action = 'http://localhost:8000/oficina/create'>
                <button class = 'btn red' type = 'submit'>Create New Oficina</button>
            </form>
            
                <ul id="dropdown" class="dropdown-content">
            
                    <li><a href="http://localhost:8000/paise">Paise</a></li>
            
                </ul>
                <a class="col s3 btn dropdown-button #1e88e5 blue darken-1" href="#!" data-activates="dropdown">Associate<i class="mdi-navigation-arrow-drop-down right"></i></a>
                        </div>
            <table>
                <thead>
                    
                    <th>nombre</th>
                    
                    <th>direccion</th>
                    
                    <th>telefono</th>
                    
                    
                    
                    
                    <th>nombre</th>
                    
                    <th>ciudad</th>
                    
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($oficinas as $value)

                    <tr>
                        
                        <td>{{$value->nombre}}</td>
                        
                        <td>{{$value->direccion}}</td>
                        
                        <td>{{$value->telefono}}</td>
                        
                        
                        
                        
                        <td>{{$value->paise->nombre}}</td>
                        
                        <td>{{$value->paise->ciudad}}</td>
                        
                        
                        
                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/oficina/{{$value->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/oficina/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/oficina/{{$value->id}}'><i class = 'material-icons'>info</i></a>
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
