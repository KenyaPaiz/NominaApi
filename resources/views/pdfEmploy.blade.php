<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="mx-auto">

    <h1>Reporte de empleados</h1>

    <table class="table table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>LastName</th>
                <th>Position</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->salary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
</body>
</html>