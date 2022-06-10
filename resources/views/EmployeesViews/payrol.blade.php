<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
        }

        table {
            width: 100%;
            border: 1px solid #000;
            }
            th, td {
            width: 25%;
            text-align: left;
            vertical-align: top;
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0.3em;
            caption-side: bottom;
        }
    </style>
</head>
<body>
    <h1>Payroll Employees</h1>
    <h3>Taxes: </h3>
    <h4>IVA = 14%</h4>
    <h4>ISSS = 7%</h4>
    <h4>ISR = 7%</h4>
    <table>
        @php
            $cont = 1;
        @endphp
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Salary</th>
                <th>Net Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payroll as $item)
                <tr>
                    <td>@php echo $cont++; @endphp</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>$ {{ $item->salary }}</td>
                    <td>$ {{ $item->netSalary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

