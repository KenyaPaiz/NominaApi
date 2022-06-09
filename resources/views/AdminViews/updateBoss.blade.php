<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Boss</title>
</head>
<body>
    <h2>Update Boss</h2>
    <form action="{{ route('boss.modify', $boss->id) }}" method="POST">
        @csrf
        @method("PUT")
        <input type="text" name="name" value="{{$boss->name}}"> 
        <input type="text" name="lastName" value="{{$boss->lastName}}"> 
        <input type="text" name="address" value="{{$boss->address}}"> 
        <input type="number" name="phoneNumber" value="{{$boss->phoneNumber}}"> 
        <input type="text" name="userName" value="{{$boss->userName}}"> 
        <input type="text" name="password" value="{{$boss->password}}"> 

        <input type="submit" name="submit" >
    </form>
</body>
</html>