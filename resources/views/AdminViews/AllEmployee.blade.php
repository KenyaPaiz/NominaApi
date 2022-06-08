@php
    session();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
</head>
<body>
    @php
        echo session('bossName');
    @endphp
    <table>
        <thead>
            <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>LastName</th>
                    <th>CellPone</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th></th>
                    <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->phoneNumber }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->salary }}</td>
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
    <a href="{{ route('employe.register') }}">Register Employee</a>
</body>
</html>