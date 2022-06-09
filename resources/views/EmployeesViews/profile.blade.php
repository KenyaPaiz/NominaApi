@php
    session();
@endphp
@extends('templateEmployee')

@section('content')
<body>
    @foreach ($employee as $item)
        <label for="">Name:</label>
        <p>{{ $item->name }}</p>
        <label for="">LastName:</label>
        <p>{{ $item->lastName }}</p>
        <label for="">PhoneNumber:</label>
        <p>{{ $item->phoneNumber }}</p>
        <label for="">Address:</label>
        <p>{{ $item->address }}</p>
        <label for="">Position:</label>
        <p>{{ $item->position }}</p>
        
    @endforeach
</body>
@endsection