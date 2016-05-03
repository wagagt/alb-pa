<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Doc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_doc_id', 'Tipo Doc Id:') !!}
    {!! Form::number('tipo_doc_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::text('path', null, ['class' => 'form-control']) !!}
</div>

<!-- Archivo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('archivo', 'Archivo:') !!}
    {!! Form::text('archivo', null, ['class' => 'form-control']) !!}
</div>

<!-- Doc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doc_id', 'Doc Id:') !!}
    {!! Form::number('doc_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('documentosChats.index') !!}" class="btn btn-default">Cancel</a>
</div>
