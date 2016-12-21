@extends('layouts.app')

@section('content')
    @include('notificaionesChats.show_fields')

    <div class="form-group">
           <a href="{!! route('notificaionesChats.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
