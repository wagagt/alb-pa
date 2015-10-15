@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Bitacoras</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('bitacoras.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($bitacoras->isEmpty())
                <div class="well text-center">No Bitacoras found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Accion</th>
			<th>Id Usuario</th>
			<th>Id Usuario</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($bitacoras as $bitacora)
                        <tr>
                            <td>{!! $bitacora->accion !!}</td>
					<td>{!! $bitacora->id_usuario !!}</td>
					<td>{!! $bitacora->id_usuario !!}</td>
                            <td>
                                <a href="{!! route('bitacoras.edit', [$bitacora->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('bitacoras.delete', [$bitacora->id]) !!}" onclick="return confirm('Are you sure wants to delete this Bitacora?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection