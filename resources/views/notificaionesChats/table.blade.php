<table class="table table-responsive" id="notificaionesChats-table">
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
    @foreach($notificaionesChats as $notificaionesChat)
        <tr>
            <td>{!! $notificaionesChat->texto !!}</td>
            <td>{!! $notificaionesChat->documento_id !!}</td>
            <td>{!! $notificaionesChat->status_id !!}</td>
            <td>{!! $notificaionesChat->user_send_id !!}</td>
            <td>{!! $notificaionesChat->user_recibe_id !!}</td>
            <td>{!! $notificaionesChat->doc_chat_id !!}</td>
            <td>
                {!! Form::open(['route' => ['notificaionesChats.destroy', $notificaionesChat->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notificaionesChats.show', [$notificaionesChat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('notificaionesChats.edit', [$notificaionesChat->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>