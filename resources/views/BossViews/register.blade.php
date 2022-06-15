<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/boss_register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('/')}}/css/main.css">
</head>
<body>
    <section class="section-flex">
        <div class="form_container">
            <form id="form" action="{{ route('boss.register') }}" method="POST">
                @csrf
                <i class="fa-solid fa-user icono" class="icon"></i>

                <div class="TitleBoss">
                    <h1 class="Title1">Register as Boss</h1>
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
                        <h6>Addrees</h6>
                    </div>
                    <div class="cont-input control-form">
                        <input class="input-contenedor" type="text" name="address" placeholder="State, city, street..." id="address">
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
                        <input class="input-contenedor" type="number" name="phoneNumber" placeholder="+000 0000-0000" id="phone">
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
                    <input type="submit" name="register" value="Register" class="btn btn-success">
                </div>
            </form>
        </div>
    </section>

    <script src="{{ url('/') }}/js/validationRegister.js"></script>
</body>
</html>

