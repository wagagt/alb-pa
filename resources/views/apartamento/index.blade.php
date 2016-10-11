@extends('layouts.admin')
@section('title', 'Torre Apartamentos ')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de Apartamentos</h3>
          <a href="apartamento/create" class="btn btn-primary" style="margin-bottom: 10px"> <i class="fa fa-building-o"></i> Crear Apartamento </a>
          <div class="box-tools">

           </div>
          </div>
         <div class="container-fluid">  
            <div class="box-body table-responsive">
              
              
                  <table id="apto-table" class="table table-hover table-bordered">
                      <thead style="display: table-header-group;">

                          <th>NUMERO</th>
                          <th>NIVEL</th>
                          <th>METROS CUADRADOS</th>
                          <th>TORRE</th>
                          <th>PROPIETARIO</th>
                          <th>ACCIONES</th>
                      </thead>
                      <tfoot style="display:table-row-group;">
                        <th>NUMERO</th>
                          <th>NIVEL</th>
                          <th>METROS CUADRADOS</th>
                          <th>TORRE</th>
                          <th>PROPIETARIO</th>
                      </tfoot>                   
                  </table>
                </div>
          </div> 

        </div>
      </div>

  @endsection
  @section('scripts')
    <script>  
          $(document).ready(function(){

            // data table armed
            $('#apto-table').DataTable({
              
                processing: true,
                serverSide: true,
                ajax:'{{ url("api/apartamentos") }}',
                columns:[
                    
                    {data: 'numero',           name: 'apartamentos.numero'},
                    {data: 'nivel',            name: 'apartamentos.nivel'},
                    {data: 'metros_cuadrados', name: 'apartamentos.metros_cuadrados'},
                    {data: 'torre',            name: 'torres.nombre'},
                    {data: 'propietario',      name: 'users.name'},
                    {data: 'acciones',         name: 'acciones', orderable:false, searchable:false}

                ],
                initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        //$(input).attr('style','width:150px');
                        $(input).appendTo($(column.footer()).empty())
                                .on('change', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                    });
                }

            });


          });
    </script>

  @endsection
