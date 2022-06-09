@php
    session();
@endphp
@extends('templateBoss')

@section('content')

<section class="section-flex">
        <div class="form_container">
        <form action="{{ route('company.modify', $company->id) }}" method="POST">
            @csrf
            @method("PUT")

            <!-- Update Form -->
            <div class="TitleBoss">
                <h1 class="Title1">Update Company</h1>
            </div>
            <!-- Name -->
            <div class="container">
                <div class="boxtitle">
                    <h6>Name</h6>
                </div>
                <div class="cont-input">
                    <input type="text" name="name" value="{{$company->name}}"> 
                </div>    
            </div>
            <br>
            <!-- Address -->
            <div class="container">
                <div class="boxtitle">
                    <h6>Address</h6>
                </div>
                <div class="cont-input">
                    <input type="text" name="address" value="{{$company->address}}"> 
                </div>    
            </div>
            <!-- Button -->
                <input type="submit" name="submit" >

        </form>
    </div>
</section>
@endsection