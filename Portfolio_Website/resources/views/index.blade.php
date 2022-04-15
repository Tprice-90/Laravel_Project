@extends('layouts.app')

@section('content')
    @if($exists===true)
        @include('master')
    @else
        @include('_create')
    @endif
@endsection
