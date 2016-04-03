<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Parqueo</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Parqueo Index</h1>
            <div class="row">
            <form class = 'col s3' method = 'get' action = 'http://localhost:8000/parqueo/create'>
                <button class = 'btn red' type = 'submit'>Create New Parqueo</button>
            </form>
                        </div>
            <table>
                <thead>
                    
                    <th>numero</th>
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($parqueos as $value)

                    <tr>
                        
                        <td>{{$value->numero}}</td>
                        
                        
                        <td>
                            <div class = 'row'>
                                <a href = '#modal1' class = 'delete btn-floating modal-trigger red' data-link = "/parqueo/{{$value->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn-floating blue' data-link = '/parqueo/{{$value->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn-floating orange' data-link = '/parqueo/{{$value->id}}'><i class = 'material-icons'>info</i></a>
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
