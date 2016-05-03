@extends('layouts.app')

@section('content')
    @include('documentosChats.show_fields')

    <div class="form-group">
           <a href="{!! route('documentosChats.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
