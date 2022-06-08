<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Update employee</h2>
    <form action="{{ route('employee.modify', $employee->id) }}" method="POST">
        @csrf
        @method("PUT")
        <input type="text" name="name" value="{{$employee->name}}"> 
        <input type="text" name="lastName" value="{{$employee->lastName}}"> 
        <input type="text" name="address" value="{{$employee->address}}"> 
        <input type="number" name="phoneNumber" value="{{$employee->phoneNumber}}">
        <input type="text" name="position" value="{{$employee->position}}"> 
        <input type="number" name="salary" value="{{$employee->salary}}">  

        <input type="submit" name="submit" >
    </form>
</body>
</html>