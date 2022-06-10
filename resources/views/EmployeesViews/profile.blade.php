@php
    session();
@endphp
@extends('templateEmployee')

@section('content')
<body>
    @foreach ($employee as $item)
    <section class="section-flex">
        <div class="form_containerEmployee">
            <!-- Profile Form -->
            <form action="{{ route('employe.save') }}" method="POST">
                @csrf
                <!-- Title -->
                <div class="TitleBoss">
                    <h1 class="Title1">Profile</h1>
                </div>
                <!-- Name -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Name</h6>
                    </div>
                    <div class="cont-input">
                        {{ $item->name }}
                    </div>    
                </div>
                <br>
                <!-- LastName -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Last Name</h6>
                    </div>
                    <div class="cont-input">
                        {{ $item->lastName }}
                    </div>    
                </div>
                <br>
                <!-- PhoneNumber -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input">
                        {{ $item->phoneNumber }}
                    </div>    
                </div>
                <!-- Address -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Addrees</h6>
                    </div>
                    <div class="cont-input">
                        {{ $item->address }}    
                    </div>   
                </div>
                <br>
                <!-- Position -->
                <div class="container">
                    <div class="boxtitle">
                        <h6>Position</h6>
                    </div>
                    <div class="cont-input">
                        {{ $item->position }}
                    </div>   
                </div>
            </form>
        </div>
    </section>
    @endforeach
</body>
@endsection