@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<body>
    @foreach ($boss as $item)
        {{$item->name}}

        {{$item->lastName}}
    @endforeach
</body>
@endsection