@php
    session();
@endphp
@extends('templateBoss')

@section('content')
    <section class="section-flex">
        <div class="form_containerCompany">
            <form action="{{ route('company.save') }}" method="POST">
                @csrf

                <div class="TitleBoss">
                    <h1 class="Title1">Register as Company</h1>
                </div>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Name</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="name" placeholder="Name">
                    </div>    
                </div>
                <br>
    
                <div class="container">
                    <div class="boxtitle">
                        <h6>Addrees</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="address" placeholder="State, city, street...">
                    </div>   
                </div>
                <br>
                <div class="button-box">
                    <input type="submit" name="register" value="Register" class="btn btn-success">
                </div>
            </form>
        </div>
    </section>
@endsection
