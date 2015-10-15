@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Proyectos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('proyectos.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($proyectos->isEmpty())
                <div class="well text-center">No Proyectos found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nombre</th>
			<th>Profundidad</th>
			<th>Perforado</th>
			<th>Maquina</th>
			<th>Metodo</th>
			<th>Observaciones</th>
			<th>Id Estado</th>
			<th>Id Estado</th>
			<th>Id Cliente</th>
			<th>Id Cliente</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($proyectos as $proyectos)
                        <tr>
                            <td>{!! $proyectos->nombre !!}</td>
					<td>{!! $proyectos->profundidad !!}</td>
					<td>{!! $proyectos->perforado !!}</td>
					<td>{!! $proyectos->maquina !!}</td>
					<td>{!! $proyectos->metodo !!}</td>
					<td>{!! $proyectos->observaciones !!}</td>
					<td>{!! $proyectos->id_estado !!}</td>
					<td>{!! $proyectos->id_estado !!}</td>
					<td>{!! $proyectos->id_cliente !!}</td>
					<td>{!! $proyectos->id_cliente !!}</td>
                            <td>
                                <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('proyectos.delete', [$proyectos->id]) !!}" onclick="return confirm('Are you sure wants to delete this Proyectos?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection