@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<body>
    @foreach ($boss as $item)
        {{$item->name}}
    @endforeach
</body>
@endsection