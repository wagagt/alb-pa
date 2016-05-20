 <div class="form-gorup">
    <div class="col-md-6">
        {!! Form::label('Nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del documento', 'required'])!!}
    </div>
</div>
<div class="form-gorup">
    <div class="col-md-6">
        {!! Form::label('TipoDocumento', 'Tipo de Documento:') !!}
        {!! Form::select('tipo_documentos_id', $tipo_documentos_list, null, ['class' => 'form-control select-country', 'placeholder' => 'Seleccione un tipo de documento', 'required'])!!}

    </div>

<div class="form-gorup">
    <div class="col-md-6">
        {!! Form::label('fecha_del', 'Fecha Desde:') !!}
        {!! Form::text('fecha_del', null, ['class' => 'form-control', 'placeholder' => 'Fecha Inicio (año-mes-dia)', 'required'])!!}
    </div>
</div>
<div class="form-gorup">
    <div class="col-md-6">
        {!! Form::label('fecha_al', 'Fecha Hasta:') !!}
        {!! Form::text('fecha_al', null, ['class' => 'form-control', 'placeholder' => 'Fecha Final (año-mes-dia)', 'required'])!!}
    </div>
</div>
<div class="form-gorup">
    <div class="col-md-6">
        {!! Form::label('torre_id', 'Torre:') !!}
        {!! Form::select('torre_id', $torres_list, null, ['class' => 'form-control select-country', 'placeholder' => 'Seleccione una torre', 'required'])!!}
    </div>
</div>

<div class="form-gorup">
  <div class="col-md-12">
    <br>
    {!! Form::hidden('user_id', Auth::user()->id ,null) !!}
    {!! Form::submit('Grabar',  ['class' => 'btn btn-primary']) !!}
   {!! Form::hidden('urlBack', $previousUrl) !!}

    <a href="{{ $previousUrl }}" class="btn btn-danger">Cancelar</a>
