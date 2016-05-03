<table class="table table-responsive" id="chatDocts-table">
    <thead>
        <th>Texto</th>
        <th>Documento Id</th>
        <th>Status Id</th>
        <th>User Send Id</th>
        <th>User Recibe Id</th>
        <th>Doc Chat Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($chatDocts as $chatDocts)
        <tr>
            <td>{!! $chatDocts->texto !!}</td>
            <td>{!! $chatDocts->documento_id !!}</td>
            <td>{!! $chatDocts->status_id !!}</td>
            <td>{!! $chatDocts->user_send_id !!}</td>
            <td>{!! $chatDocts->user_recibe_id !!}</td>
            <td>{!! $chatDocts->doc_chat_id !!}</td>
            <td>
                {!! Form::open(['route' => ['chatDocts.destroy', $chatDocts->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('chatDocts.show', [$chatDocts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('chatDocts.edit', [$chatDocts->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>