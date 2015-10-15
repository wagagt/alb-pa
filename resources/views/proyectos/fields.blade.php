<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Profundidad Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profundidad', 'Profundidad:') !!}
    {!! Form::text('profundidad', null, ['class' => 'form-control']) !!}
</div>

<!--- Perforado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('perforado', 'Perforado:') !!}
    {!! Form::text('perforado', null, ['class' => 'form-control']) !!}
</div>

<!--- Maquina Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('maquina', 'Maquina:') !!}
    {!! Form::text('maquina', null, ['class' => 'form-control']) !!}
</div>

<!--- Metodo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('metodo', 'Metodo:') !!}
    {!! Form::text('metodo', null, ['class' => 'form-control']) !!}
</div>

<!--- Observaciones Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_estado', 'Id Estado:') !!}
    {!! Form::text('id_estado', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_estado', 'Id Estado:') !!}
    {!! Form::text('id_estado', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Cliente Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::text('id_cliente', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Cliente Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_cliente', 'Id Cliente:') !!}
    {!! Form::text('id_cliente', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
