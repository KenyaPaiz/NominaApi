@php
    session();
@endphp
@extends('templateBoss')

@section('content')
    <section class="section-flex">
        <div class="form_containerEmployee">
            <form id="form" action="{{ route('employe.save') }}" method="POST">
                @csrf

                <div class="TitleBoss">
                    <h1 class="Title1">Register Employee</h1>
                </div>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Name</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="text" name="name" placeholder="Name" id="name">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="boxtitle">
                        <h6>Last Name</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="text" name="lastName" placeholder="Last Name" id="lastName">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Department</h6>
                    </div>
                    <div class="cont-input control-form">
                        <select class="input-contenedor" name="department" id="department" required>
                            <option value="-1">Seleccionar...</option>
                            @foreach ($department as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Position</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="text" name="position" placeholder="Position" id="position">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Salary</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="number" name="salary" placeholder="$0.00" id="salary">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="number" name="phoneNumber" placeholder="(+000)000-0000" id="phone">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Username</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="text" name="userName" placeholder="Username" id="username">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Password</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="password" name="password" placeholder="Password" id="password">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Confirm Password</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="password" name="ConPassword" placeholder="Password" id="password2">
                        <br>
                        <small>Error message</small>
                    </div>
                </div>
                <br>
                <div class="button-box">
                    <input id="button" type="submit" name="register" value="Register" class="btn btn-success">
                </div>
            </form>
        </div>
    </section>
    <script src="{{ url('/') }}/js/validationEmployee.js"></script>

@endsection

