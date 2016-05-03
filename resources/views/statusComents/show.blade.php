@extends('layouts.app')

@section('content')
    @include('statusComents.show_fields')

    <div class="form-group">
           <a href="{!! route('statusComents.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
