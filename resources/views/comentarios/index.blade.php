@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Comentarios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('comentarios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($comentarios->isEmpty())
                <div class="well text-center">No Comentarios found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Comentario</th>
			<th>Avance</th>
			<th>Horas</th>
			<th>Id Usuario</th>
			<th>Id Usuario</th>
			<th>Id Proyecto</th>
			<th>Id Proyecto</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($comentarios as $comentarios)
                        <tr>
                            <td>{!! $comentarios->comentario !!}</td>
					<td>{!! $comentarios->avance !!}</td>
					<td>{!! $comentarios->horas !!}</td>
					<td>{!! $comentarios->id_usuario !!}</td>
					<td>{!! $comentarios->id_usuario !!}</td>
					<td>{!! $comentarios->id_proyecto !!}</td>
					<td>{!! $comentarios->id_proyecto !!}</td>
                            <td>
                                <a href="{!! route('comentarios.edit', [$comentarios->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('comentarios.delete', [$comentarios->id]) !!}" onclick="return confirm('Are you sure wants to delete this Comentarios?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection