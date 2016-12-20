<table class="table table-responsive" id="documentosChats-table">
    <thead>
        <th>Nombre</th>
        <th>Tipo Doc Id</th>
        <th>Path</th>
        <th>Archivo</th>
        <th>Doc Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documentosChats as $documentosChat)
        <tr>
            <td>{!! $documentosChat->nombre !!}</td>
            <td>{!! $documentosChat->tipo_doc_id !!}</td>
            <td>{!! $documentosChat->path !!}</td>
            <td>{!! $documentosChat->archivo !!}</td>
            <td>{!! $documentosChat->doc_id !!}</td>
            <td>
                {!! Form::open(['route' => ['documentosChats.destroy', $documentosChat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documentosChats.show', [$documentosChat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documentosChats.edit', [$documentosChat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>