@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($company as $element)
        <tr>
            <td>{{$element->name}}</td>
            <td>{{$element->address}}</td>
            <td>
                <form action="{{ route("company.edits", $element->id) }}" method="GET">
                    <button type="submit" name="edit">Edit</button>
                </form>
                <br>
                <form action="{{ route("company.inactive", $element->id) }}" method="GET">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
