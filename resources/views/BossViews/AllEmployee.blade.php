@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<br>
<table class="table table-bordered">
    <thead>
        <tr>
                <th>Id</th>
                <th>Name</th>
                <th>LastName</th>
                <th>CellPhone</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cont = 1;
        @endphp
        @foreach ($employee as $item)
            <tr>
                <td>@php echo $cont++; @endphp</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->lastName }}</td>
                <td>{{ $item->phoneNumber }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->position }}</td>
                <td>$ {{ $item->salary }}</td>
                <td>
                    <form action="{{ route('employe.edits', $item->id) }}" method="GET">
                        <button type="submit" name="editEmployee">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route("employee.inactive", $item->id) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <button type="submit" name="deleteEmployee">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<a href="{{ route('pdf') }}">PDF</a>
@endsection