@php
    session();
@endphp
@extends('templateBoss')

@section('content')

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
                <input type="text" name="name" value="{{$employee->name}}">
            </div>    
        </div>
        <br>
        <!-- LastName -->
        <div class="container">
            <div class="boxtitle">
                <h6>Last Name</h6>
            </div>
            <div class="cont-input">
                <input type="text" name="lastName" value="{{$employee->lastName}}">     
            </div>    
        </div>
        <br>
        <!-- Address -->
        <div class="container">
            <div class="boxtitle">
                <h6>Addrees</h6>
            </div>
            <div class="cont-input">
                <input type="text" name="address" value="{{$employee->address}}">                    
            </div>   
        </div>
        <br>
        <!-- PhoneNumber -->
        <div class="container">
            <div class="boxtitle">
                <h6>Phone Number</h6>
            </div>
            <div class="cont-input">
                <input type="number" name="phoneNumber" value="{{$employee->phoneNumber}}">
            </div>    
        </div>
        <br>
        <!-- Position -->
        <div class="container">
            <div class="boxtitle">
                <h6>Position</h6>
            </div>
            <div class="cont-input">
                <input type="text" name="position" value="{{$employee->position}}"> 
            </div>
        </div>
        <br>
        <!-- Salary -->
        <div class="container">
            <div class="boxtitle">
                <h6>Salary</h6>
            </div>
            <div class="cont-input">
                <input type="number" name="salary" value="{{$employee->salary}}">  
            </div>
        </div>
        <br>
        
    <!-- Button -->
    <input type="submit" name="submit">
</form>
@endsection