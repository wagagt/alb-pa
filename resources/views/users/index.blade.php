@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Usuarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('users.create') !!}">Agregar Nuevo</a>
        </div>

        <div class="row">
            @if($users->isEmpty())
                <div class="well text-center">No Users found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Contacto Nombres</th>
			<th>Contacto Apellidos</th>
			<th>Email</th>
			<th>Id Rol</th>
			<th>Id Cliente</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($users as $users)
                        <tr>
                            <td>{!! $users->name !!}</td>
					<td>{!! $users->contact_fname !!}</td>
					<td>{!! $users->contact_lname !!}</td>
					<td>{!! $users->email !!}</td>
					<td>{!! $users->rol->descripcion !!}</td>
					<td>{!! $users->cliente->nombre !!}</td>
                            <td>
                                <a href="{!! route('users.edit', [$users->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('users.delete', [$users->id]) !!}" onclick="return confirm('Are you sure wants to delete this Users?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection