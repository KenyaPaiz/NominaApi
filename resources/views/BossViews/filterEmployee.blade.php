@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('filterPosition') }}" method="POST">
            @csrf
            @method("GET")
            <h2 class="text-center">SEARCH FILTER</h2><br>
            <label> Select a position</label><br>
            <select name="position" id="position">
                <option value=""></option>
                @foreach ($position as $item)
                    <option value="{{$item->position}}">{{$item->position}}</option>
                @endforeach
            </select>
            <input class="btn btn-success" type="submit" name="submit" value="Generate PDF">
        </form>
            
        <br>
        <br>
        <br>

        <form action="{{ route('filterDepartment') }}" method="POST">
            @csrf
            @method("GET")
            <label for="">Select a department</label><br>
            <select name="department" id="">
                <option value=""></option>
                @foreach ($department as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <input class="btn btn-success" type="submit" name="submit" value="Generate PDF">
            <br>
        </form>
    </div>
</div>
@endsection
