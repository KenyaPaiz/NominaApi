@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<main>
    <div class="content h1">
        <h1>Employee</h1>
    </div>
    <table class="table table-hover">
        @php
            $cont = 1;
        @endphp
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>LastName</th>
                <th>CellPhone</th>
                <th>Department</th>
                <th>Position</th>
                <th>Salary</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $item)
                <tr>
                    <td>@php echo $cont++; @endphp</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->phoneNumber }}</td>
                    <td>{{ $item->department }}</td>
                    <td>{{ $item->position }}</td>
                    <td>$ {{ $item->salary }}</td>
                    <!-- Edit Button -->
                    <td>
                        <form action="{{ route('employe.edits', $item->id) }}" method="GET">
                            <button class="btn btn-success" type="submit" name="editEmployee">Edit</button>
                        </form>
                    </td>
                    <!-- Delete Button -->
                    <td>
                        <form action="{{ route("employee.inactive", $item->id) }}" method="POST">
                            @method("PUT")
                            @csrf
                            <button class="btn btn-danger" type="submit" name="deleteEmployee">Delete</button>
                        </form>
                    </td>
                    <!-- Show Button -->
                    <td>
                        <form action="{{ route("boss.employee", $item->id) }}" method="POST">
                            @method("GET")
                            @csrf
                            <button class="btn btn-info" type="submit" name="showEmployee">Show</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="content options">
        <a class="btn btn-primary" href="{{ route('boss.taxes') }}">PDF PAYROLLS</a>
    </div>
</main>
@endsection