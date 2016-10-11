@extends('layouts.admin')
@section('title', 'Usuarios Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de usuarios</h3>
          <div class="col-md-12 text-left"> 

              <a href="{{route('users.create')}}" class="btn btn-primary" style="margin-bottom: 10px"><i class="fa fa-user-plus"></i>  CREAR USAURIO </a>
              </div>
          </div>

          <div class=" container-fluid">
            <div class="box-body table-responsive">
              

              <table id="users-table" class="table table-bordered table-hover">
                    <thead style="display: table-header-group;">

                      <th><strong>NOMBRE</strong></th>
                      <th><strong>USUARIO</strong></th>
                      <th><strong>CORREO</strong></th>
                      <th><strong>TIPO</strong></th>
                      <th><strong>STATUS</strong></th>
                      <th><strong>ACCIONES</strong></th>
                    </thead>
                    <tfoot style="display:table-row-group;">
                      <th><strong>NOMBRE</strong></th>
                      <th><strong>USUARIO</strong></th>
                      <th><strong>CORREO</strong></th>
                      <th><strong>TIPO</strong></th>
                      
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
            $('#users-table').DataTable({
              
                processing: true,
                serverSide: true,
                ajax:'{{ url("api/users") }}',
                columns:[
                    
                    {data: 'name',             name: 'name'},
                    {data: 'usuario',          name: 'usuario'},
                    {data: 'email',            name: 'email'},
                    {data: 'tipo',             name: 'tipo'},
                    {data: 'status',           name: 'status', orderable:false, searchable:false},
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
