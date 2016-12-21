<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Apartamento</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Apartamento</h1>
            <form method = 'get' action = 'http://localhost:8000/apartamento'>
                <button class = 'btn blue'>Apartamento Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>numero : </i></b>
                        </td>
                        <td>{{$apartamento->numero}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>nivel : </i></b>
                        </td>
                        <td>{{$apartamento->nivel}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>cantidad_banios : </i></b>
                        </td>
                        <td>{{$apartamento->cantidad_banios}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>metros_cuadrados : </i></b>
                        </td>
                        <td>{{$apartamento->metros_cuadrados}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>ambientes : </i></b>
                        </td>
                        <td>{{$apartamento->ambientes}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>dormitorios : </i></b>
                        </td>
                        <td>{{$apartamento->dormitorios}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>marca_v_1 : </i></b>
                        </td>
                        <td>{{$apartamento->marca_v_1}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>modelo_v_1 : </i></b>
                        </td>
                        <td>{{$apartamento->modelo_v_1}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>placa_v_1 : </i></b>
                        </td>
                        <td>{{$apartamento->placa_v_1}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>marca_v_2 : </i></b>
                        </td>
                        <td>{{$apartamento->marca_v_2}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>modelo_v_2 : </i></b>
                        </td>
                        <td>{{$apartamento->modelo_v_2}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>placa_v_2 : </i></b>
                        </td>
                        <td>{{$apartamento->placa_v_2}}</td>
                    </tr>
                    

                                                
                        
                        <tr>
                        <td>
                            <b><i>nombre : </i><b>
                        </td>
                        <td>{{$apartamento->torre->nombre}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>direccion : </i><b>
                        </td>
                        <td>{{$apartamento->torre->direccion}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>niveles : </i><b>
                        </td>
                        <td>{{$apartamento->torre->niveles}}</td>
                        </tr>
                        
                        
                        
                </tbody>
            </table>
        </div>
    </body>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
