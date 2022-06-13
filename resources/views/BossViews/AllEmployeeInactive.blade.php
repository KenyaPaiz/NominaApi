@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<main>
    <div class="content h1">
        <h1>Inactive Employees</h1>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($employeeInactive as $item)
                <tr>
                    <td>@php echo $cont++; @endphp</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->phoneNumber }}</td>
                    <td>{{ $item->department }}</td>
                    <td>{{ $item->position }}</td>
                    <td>$ {{ $item->salary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection