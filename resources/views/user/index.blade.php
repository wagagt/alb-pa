@extends('layouts.admin')
@section('title', 'Usuarios Lista')
  @section('content')
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de usuarios</h3>
          <div class="box-tools">

            <!-- Buscador de Tags -->
            <div class="input-group input-group-sm">
              {!! Form::open(['route'=>'users.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
              <div class="input-group">

                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar usuario...',
                  'aria-describedby'=>'search','autofocus']) !!}
                  <span class="input-group-addon" id="search"><i class="fa fa-search"></i></span>
                </div>

                {!! Form::close() !!}
              </div>
              <!-- Fin del buscador -->




            </div>
          </div>

          <div class="box-body">
            <div class="col-md-12 text-left"><a href="{{route('users.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>  CREAR USAURIO </a>  </div>
            <table class="table table-hover">
              <thead>

                <td><strong>NOMBRE</strong></td>
                <td><strong>USUARIO</strong></td>
                <td><strong>CORREO</strong></td>
                <td><strong>TIPO</strong></td>
                <td><strong>STATUS</strong></td>
                <td><strong>ACCIONES</strong></td>

              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->usuario}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if(($user->tipo == "admin") || ($user->tipo == "super_admin") )
                        <span class="label label-danger"> <i class="fa fa-lock"></i>- {{ $user->tipo }}</span>
                      @else
                        <span class="label label-primary"> <i class="fa fa-users  "></i>  - {{ $user->tipo }}</span>
                      @endif
                    </td>
                    <td>
                      @if($user->status == 1)
                        <span class="label label-success"> <i class="fa fa-check-square"></i></span>
                      @else
                        <span class="label label-danger"> <i class="fa fa-minus-square"></i></span>
                      @endif
                    </td>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning" title="Editar">
                      <i class="fa fa-pencil-square-o"></i></a> <a href="{{ route('users.destroy', $user->id) }}"
                        class="btn btn-danger" title="Elimiar" onclick="return confirm('¿Seguro que desea eliminar el registro?')">
                        <i class="fa fa-trash"></i></a></td>
                      </tr>

                    @endforeach
                  </tbody>
                </table>
                {!! $users->render()  !!}
              </div>



            </div>
          </div>
        @endsection
