@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<main>
    <div class="content h1">
        <h1>Company</h1>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($company as $element)
                <tr>
                    <td>{{$element->name}}</td>
                    <td>{{$element->address}}</td>
                    <td>
                        <form action="{{ route("company.edits", $element->id) }}" method="GET">
                            <button class="btn btn-success" type="submit" name="edit">Edit</button>
                        </form>
                    </td>   
                    <td>
                        <form action="{{ route("company.inactive", $element->id) }}" method="POST">
                            @method("PUT")
                            @csrf
                            <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
