@php
    session();
@endphp
@extends('templateBoss')

@section('content')
<section class="section-flex">
    <div class="form_container">
        <form action="{{ route('boss.modify', $boss->id) }}" method="POST">
            @csrf
            @method("PUT")

            <!-- Update Form -->
            <div class="TitleBoss">
                    <h1 class="Title1">Update Boss</h1>
                </div>
                <!-- Name -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Name</h6>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="name" value="{{$boss->name}}">
                    </div>    
                </div>
                <br>
                <!-- LastName -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Last Name</h6>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="lastName" value="{{$boss->lastName}}">   
                    </div>    
                </div>
                <br>
                <!-- Address -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Addrees</h6>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="address" value="{{$boss->address}}">                    
                    </div>   
                </div>
                <br>
                <!-- PhoneNumber -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input">
                        <input type="number" name="phoneNumber" value="{{$boss->phoneNumber}}"> 
                    </div>    
                </div>
                <br>
                <!-- UserName -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Username</h6>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="userName" value="{{$boss->userName}}">
                    </div>
                </div>
                <br>
                <br>
                <!-- Password -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Password</h6>
                    </div>
                    <div class="cont-input">
                        <input type="text" name="password" value="{{$boss->password}}"> 
                    </div>
                </div>
                <br>
                <!-- Button -->
                <div class="container">
                    <div class="button-box">
                        <input type="submit" name="submit" >
                    </div>
                </div> 
            </form>
    </div>  
</section>
@endsection