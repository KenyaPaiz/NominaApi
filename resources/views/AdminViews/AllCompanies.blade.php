<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Companies</title>
</head>
<body>
<table>
       <thead>
           <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Boss</th>
                <th></th>
           </tr>
       </thead>
       <tbody>
    @foreach($company as $element)
            <tr>
                <td>{{$element->id}}</td>
                <td>{{$element->name}}</td>
                <td>{{$element->address}}</td>
                <td>{{$element->idBoss}}</td>
                <td>
                    <form action="{{ route("company.edits", $element->id) }}" method="GET">
                        <button type="submit" name="edit">Edit</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route("company.inactive", $element->id) }}" method="GET">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
    @endforeach
        </tbody>
    </table>
</body>
</html>