<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bosses</title>
</head>
<body>
    <table>
       <thead>
           <tr>
                <th>Id</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Address</th>
                <th>CellPone</th>
                <th></th>
                <th></th>
           </tr>
       </thead>
       <tbody>
    @foreach($boss as $element)
            <tr>
                <td>{{$element->id}}</td>
                <td>{{$element->name}}</td>
                <td>{{$element->lastName}}</td>
                <td>{{$element->address}}</td>
                <td>{{$element->phoneNumber}}</td>
                <td>
                    <form action="{{ route("boss.edits", $element->id) }}" method="GET">
                        <button type="submit" name="edit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route("boss.inactive", $element->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ route('boss.form') }}">Register Boss</a>
</body>
</html>