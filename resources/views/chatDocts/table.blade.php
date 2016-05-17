<table class="table table-hover" id="chatDocts-table">
    <thead>
        <th>Texto</th>
        <th>Documento</th>
        <th>Status</th>
        <th>Usuario envia</th>
        <th>Usuario Recibe</th>
        <th>Adjunto</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($chatDocts as $chatDocts)
        <tr>
            <td>{!! $chatDocts->texto !!}</td>
            <td>{!! $chatDocts->documento_id !!}</td>
            <td>{!! $chatDocts->status->tipo !!}</td>
            <td>{!! $chatDocts->user->usuario !!}</td>
            <td>{!! $chatDocts->usuario->usuario !!}</td>
            <td>{!! $chatDocts->doc_chat_id !!}</td>
            <td>
                {!! Form::open(['route' => ['chatDocts.destroy', $chatDocts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>