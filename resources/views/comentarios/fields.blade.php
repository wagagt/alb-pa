<!--- Comentario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comentario', 'Comentario:') !!}
    {!! Form::text('comentario', null, ['class' => 'form-control']) !!}
</div>

<!--- Avance Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('avance', 'Avance:') !!}
    {!! Form::text('avance', null, ['class' => 'form-control']) !!}
</div>

<!--- Horas Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('horas', 'Horas:') !!}
    {!! Form::text('horas', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Usuario Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_usuario', 'Id Usuario:') !!}
    {!! Form::text('id_usuario', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Proyecto Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    {!! Form::text('id_proyecto', null, ['class' => 'form-control']) !!}
</div>

<!--- Id Proyecto Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('id_proyecto', 'Id Proyecto:') !!}
    {!! Form::text('id_proyecto', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
