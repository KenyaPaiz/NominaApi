<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reporte de empleados</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>LastName</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>