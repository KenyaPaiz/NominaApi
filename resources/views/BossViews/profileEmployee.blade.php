<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employe Profile</title>
</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
                <th>Name</th>
                <th>LastName</th>
                <th>CellPhone</th>
                <th>Address</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Payrol</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->lastName }}</td>
                <td>{{ $item->phoneNumber }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->position }}</td>
                <td>$ {{ $item->salary }}</td>
                <td> <!-- agregar Nomina --></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>