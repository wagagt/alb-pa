
<div class="form-group col-md-3">
    {!! Form::label('torre_id', 'Edificio:') !!}
    {!! Form::select('torre_id',  $edificios, null,['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-3">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null,['class' => 'form-control', 'autofocus', 'tab-index' =>1]) !!}
</div>

<div class="form-group col-md-2">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null,['class' => 'form-control', 'tab-index' =>2]) !!}
</div>


<div class="form-group  col-md-2">
    {!! Form::label('mora', '% Mora:') !!}
    {!! Form::text('mora', null,['class' => 'form-control', 'tab-index' =>3]) !!}
</div>

<div class="form-group  col-md-2">
    {!! Form::label('status', 'Estado:') !!}
    {!! Form::select('status',
    [
        'creada'    => 'Creada',
        'generada'  => 'Generada',
        'inactiva'  => 'Inactiva',
        'porcesada' => 'Procesada'

    ],null,['class' => 'form-control', 'tab-index' =>4]) !!}
</div>
