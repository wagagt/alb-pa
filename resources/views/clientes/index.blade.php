@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Clientes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('clientes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($clientes->isEmpty())
                <div class="well text-center">No Clientes found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Contacto Nombres</th>
			<th>Contacto Apellidos</th>
			<th>Telefono</th>
			<th>Direccion</th>
			<th>Email</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($clientes as $clientes)
                        <tr>
                            <td>{!! $clientes->nombre !!}</td>
					<td>{!! $clientes->contacto_nombres !!}</td>
					<td>{!! $clientes->contacto_apellidos !!}</td>
					<td>{!! $clientes->telefono !!}</td>
					<td>{!! $clientes->direccion !!}</td>
					<td>{!! $clientes->email !!}</td>
                            <td>
                                <a href="{!! route('clientes.edit', [$clientes->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('clientes.delete', [$clientes->id]) !!}" onclick="return confirm('Are you sure wants to delete this Clientes?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection