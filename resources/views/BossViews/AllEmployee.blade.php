<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
</head>
<body>
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
           </tr>
       </thead>
       <tbody>
    @foreach($boss as $element)
            <tr>
                <td>{{$element->id}}</td>
                <td>{{$element->name}}</td>
                <td>{{$element->lastName}}</td>
                <td>{{$element->phoneNumber}}</td>
                <td>{{$element->address}}</td>
                <td>{{$element->position}}</td>
                <td>{{$element->salary}}</td>
                <td><input type="submit" value="Delete"></td>
            </tr>
    @endforeach
        </tbody>
    </table>
    
</body>
</html>