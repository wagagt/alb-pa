<!-- Texto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('texto', 'Texto:') !!}
    {!! Form::textarea('texto', null, ['class' => 'form-control']) !!}
</div>

<!-- Documento Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('documento_id', 'Documento Id:') !!}
    {!! Form::select('documento_id', ['Option1' => 'Option1', 'Option2' => 'Option2', 'Option3' => 'Option3'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::select('status_id', ['Option1' => 'Option1', 'Option2' => 'Option2', 'Option3' => 'Option3'], null, ['class' => 'form-control']) !!}
</div>

<!-- User Send Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_send_id', 'User Send Id:') !!}
    {!! Form::number('user_send_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Recibe Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_recibe_id', 'User Recibe Id:') !!}
    {!! Form::number('user_recibe_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Doc Chat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_chat_id', 'Doc Chat Id:') !!}
    {!! Form::number('doc_chat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('chatDocts.index') !!}" class="btn btn-default">Cancel</a>
</div>
