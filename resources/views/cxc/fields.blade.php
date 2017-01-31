
<div class="form-group col-md-3">
    {!! Form::label('torre_id', 'Edificio:') !!}
    {!! Form::select('torre_id',  $edificios, null,['class' => 'form-control', 'required']) !!}
</div>

<div class="form-group col-md-3">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null,['class' => 'form-control', 'autofocus', 'tab-index' =>1, 'required']) !!}
</div>

<div class="form-group col-md-3">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::text('monto', null,['class' => 'form-control', 'tab-index' =>2,'required']) !!}
</div>


<div class="form-group  col-md-3">
    {!! Form::label('mora', '% Mora:') !!}
    {!! Form::text('mora', null,['class' => 'form-control', 'tab-index' =>3, 'required']) !!}
</div>



<div class="form-group  col-md-3">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado',
    [
        'creada'      => 'Creada',
        'generada'    => 'Generada',
        'inactiva'    => 'Inactiva',
        'porcesada'   => 'Procesada'

    ],null,['class' => 'form-control', 'tab-index' =>5,'required', 'disabled']) !!}
</div>

<div class="form-group  col-md-3">
    {!! Form::label('recurrencia', 'Recurrencia:') !!}
    {!! Form::select('recurrencia',
    [
        'placeholder' => 'Seleccione una opción',
        'unico'       => 'Único',
        'semanal'     => 'Semanal',
        'mensual'     => 'Mensual',
        'trimestral'  => 'Trimestral'

    ],null,['class' => 'form-control', 'tab-index' =>6, 'required']) !!}
</div>

<div class="form-group  col-md-2">
    {!! Form::label('dia_del_mes', 'Día del mes cobro:') !!}
    {!! Form::selectRange('dia_del_mes', 1,31, null ,['class' => 'form-control', 'tab-index' =>7, 'required']) !!}
</div>

<div class="form-group  col-md-2">
    {!! Form::label('fecha_inicio_cobro', 'Fecha inicio de cobro:') !!}
    {!! Form::text('fini', null ,['class' => 'form-control dpk_date_ini', 'tab-index' =>8, 'required']) !!}
</div>
<div class="form-group  col-md-2">
    {!! Form::label('fecha_fin_cobro', 'Fecha fin de cobro:') !!}
    {!! Form::text('ffin', null ,['class' => 'form-control dpk_date_fin', 'tab-index' =>9]) !!}
</div>

<div class="form-group col-md-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    {!! Form::textarea('descripcion', null,['class' => 'form-control', 'placeholder' => 'describa brevemente el objetivo de la cxc', 'tab-index' =>4, 'required']) !!}
</div>



<div class="form-gorup">
    <div class="col-md-12 text-left">
        {!! Form::hidden('status', 'creada' ,null) !!}
        <a href="{{ URL::previous() }}" class="btn btn-danger" style="margin-left: 5px; margin-right: 5px">Cancelar</a>
        {!! Form::submit('Grabar',  ['class' => 'btn btn-primary', 'tab-index' =>10]) !!}
    </div>
</div>



