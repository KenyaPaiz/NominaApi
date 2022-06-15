<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <title>Payroll REPORT</title>
</head>
<body>
    <h1 class="text-center">PAYROLL EMPLOYEE</h1>
    <table class="table table-dark">
        @php
            $cont = 1;
        @endphp
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Taxes</th>
                <th>Net Salary</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($payroll as $item)
                <tr class="text-center">
                    <td>@php echo $cont++; @endphp</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->position }}</td>
                    <td>$ {{ $item->salary }}</td>
                    <td>${{ $item->taxes }}</td>
                    <td>$ {{ $item->netSalary }}</td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="text-center">
                <td colspan='5'>TAXES:  ISR = 3.5%  ---  ISSS = 7%  ---  AFP = 7%  ---  </td>
            </tr>
        </tfoot>
    </table>

    <h5>Total employees: <b>{{$contador}}</b></h5>
</body>
</html>


