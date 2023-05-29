@extends('layouts.index')
@section('content')
@if (Session::has('status'))
<div class="alert alert-danger text-center">
    {{Session::get('message')}}
</div>
@endif
@endsection