@extends('layouts.app')

@section('content')
    @include('chatDocts.show_fields')

    <div class="form-group">
           <a href="{!! route('chatDocts.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
