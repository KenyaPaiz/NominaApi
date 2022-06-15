@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<section class="section-flex">
    <div class="form_containerEmployeeUpdate">
        <form action="{{ route('employee.modify', $employee->id) }}" method="POST">
            @csrf
            @method("PUT")
                
            <!-- Update Form -->
            <div class="TitleBoss">
                    <h1 class="Title1">Update Employee</h1>
                </div>
                <!-- Name -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Name</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="name" value="{{$employee->name}}">
                    </div>    
                </div>
                <br>
                <!-- LastName -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Last Name</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="lastName" value="{{$employee->lastName}}">     
                    </div>    
                </div>
                <br>
                <!-- Address -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Department</h6>
                    </div>
                    <div class="cont-input">
                        <select class="input-contenedor" name="department" id="">
                            @foreach ($department as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>                 
                    </div>   
                </div>
                <br>
                <!-- PhoneNumber -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="number" name="phoneNumber" value="{{$employee->phoneNumber}}">
                    </div>    
                </div>
                <br>
                <!-- Position -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Position</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="position" value="{{$employee->position}}"> 
                    </div>
                </div>
                <br>
                <div class="button-box">
                    <input id="button" type="submit" name="update" value="Update" class="btn btn-success">
                </div>
        </form>
    </div>  
</section>
@endsection