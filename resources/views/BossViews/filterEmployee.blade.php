@php
    session();
@endphp
@extends('templateBoss')

@section('content')
    <form action="{{ route('filterPosition') }}" method="POST">
        @csrf
        @method("GET")
        <label for="">Search Filter:</label><br>
        <label for="">Select a position</label>
        <select name="position" id="">
            <option value=""></option>
            @foreach ($position as $item)
                <option value="{{$item->position}}">{{$item->position}}</option>
            @endforeach
        </select>
        <input type="submit" name="submit" value="generate PDF">
        <br>
    </form>
    
    <form action="{{ route('filterDepartment') }}" method="POST">
        @csrf
        @method("GET")
        <label for="">Search Filter:</label><br>
        <label for="">Select a department</label>
        <select name="department" id="">
            <option value=""></option>
            @foreach ($department as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        <input type="submit" name="submit" value="generate PDF">
    </form>
@endsection