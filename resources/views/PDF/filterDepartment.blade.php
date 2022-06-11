<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List of employees by department</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Lastname</th>
                <th>Deparment</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Taxes</th>
                <th>Net Salary</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($department as $item)
                <tr>
                    <td>@php echo $cont++; @endphp</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->department }}</td>
                    <td>{{ $item->position }}</td>
                    <td>$ {{ $item->salary }}</td>
                    <td>$ {{ $item->taxes }}</td>
                    <td>$ {{ $item->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

