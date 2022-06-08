<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Register</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/boss_register.css">
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</head>
<body>
    <header>
        <nav>
            <a href="#">Log In</a>
            <a href="#">About us</a>
        </nav>
    </header>
   
    <section class="section-flex">
        <div class="form_container">
            <form action="{{ route('boss.register') }}" method="POST">
                @csrf
                <i class="fa-solid fa-user icono" class="icon"></i>

                <div class="TitleBoss">
                    <h1 class="Title1">Register as Boss</h1>
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
                        <h6>Last Name</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="lastname" placeholder="Last Name">
                    </div>    
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Addrees</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="addrees" placeholder="State, city, street...">
                    </div>   
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="Text" name="phoneNumber" placeholder="(+000)000-0000">
                    </div>    
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Username</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="username" placeholder="Username">
                    </div>    
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Password</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="password" name="password" placeholder="Password">
                    </div>    
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Confirm Password</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="password" name="ConPassword" placeholder="Password">
                    </div>   
                </div>
                <br>
            </form>
        </div>
        <div>
            <i class="fa-thin fa-user" class="icon"></i>
        </div>
        <div class="button-box">
            <input type="button" name="register" value="Register" class="btn btn-success">
        </div>
    </section>
    
</body>
</html>

