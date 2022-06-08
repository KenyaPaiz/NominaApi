<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Update Boss</h2>
    <form action="{{ route('company.modify', $company->id) }}" method="POST">
        @csrf
        @method("PUT")
        <input type="text" name="name" value="{{$company->name}}"> 
        <input type="text" name="address" value="{{$company->address}}"> 
        <input type="submit" name="submit" >
    </form>
</body>
</html>