@php
    session();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boss Register</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/register_company.css">
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!--Tipografia-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <a href="#">About us</a>
        </nav>
    </header>
   
    <section class="section-flex">
        <div class="form_container">
            <form action="{{ route('company.save') }}" method="POST">
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
    
</body>
</html>

