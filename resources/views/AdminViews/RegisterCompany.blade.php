<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Register</title>
</head>
<body>
<form action="{{ route('company.save') }}" method="POST">
        @csrf
        <input type="text" name="name" >
        <input type="text" name="address" >

        <input type="submit" name="submit" >
    </form>
</body>
</html>