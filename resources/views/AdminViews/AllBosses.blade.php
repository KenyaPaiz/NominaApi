@php
    session();
@endphp
@extends('templateAdmin')

@section('content')
<br>
<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>LastName</th>
                <th>Address</th>
                <th>CellPhone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $cont = 1;
        @endphp
        @foreach($boss as $element)
            <tr>
                <td>@php echo $cont++; @endphp</td>
                <td>{{$element->name}}</td>
                <td>{{$element->lastName}}</td>
                <td>{{$element->address}}</td>
                <td>{{$element->phoneNumber}}</td>
                <td>
                    <form action="{{ route("boss.inactive", $element->id) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
@endsection