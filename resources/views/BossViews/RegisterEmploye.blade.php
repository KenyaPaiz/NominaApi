@extends('resources')
<body>
    <header>
        <nav>
            <a href="#">About us</a>
        </nav>
    </header>
    <section class="section-flex">
        <div class="form_container">
            <form action="{{ route('employe.save') }}" method="POST">
                @csrf
                <i class="fa-solid fa-user icono" class="icon"></i>

                <div class="TitleBoss">
                    <h1 class="Title1">Register Employee</h1>
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
                        <input class="input-contenedor" type="text" name="lastName" placeholder="Last Name">
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

                <div class="container">
                    <div class="boxtitle">
                        <h6>Posotion</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="position" placeholder="Position">
                    </div>   
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Salary</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="number" name="salary" placeholder="$0.00">
                    </div>   
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="number" name="phoneNumber" placeholder="(+000)000-0000">
                    </div>    
                </div>
                <br>

                <div class="container">
                    <div class="boxtitle">
                        <h6>Username</h6>
                    </div>
                    <div class="cont-input">
                        <input class="input-contenedor" type="text" name="userName" placeholder="Username">
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
                <br><br>
                <div class="container">
                    <div class="button-box">
                        <input type="submit" name="register" value="Register" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
        <div>
            <i class="fa-thin fa-user" class="icon"></i>
        </div>
    </section>
</body>
</html>

