@php
    session();
@endphp
@extends('templateBoss')

@section('content')
@foreach ($employee as $item)
    {{$item}}
@endforeach
@endsection