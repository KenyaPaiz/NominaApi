<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>
<body>
    <form action="{{ route('boss.access') }}" method="POST">
        <label for="">Username:</label>
        <input type="text" name="user" placeholder="user"><br>
        <label for="">Password:</label>
        <input type="text" name="password" placeholder="pass">
        <br>
        <input type="submit" value="ingresar">
    </form>
</body>
</html>