<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PayRoll</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/css/main.css">
</head>

<body>
    <section class="login py-5 bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="./img/tech.jpg" class="img-fluid">

                </div>
                <div class="col-lg-7 text-center py-5 my-5 container">
                    <h1 class="animate__animated animate__fadeInDown">LOGIN</h1>

                    <form id="form" action="{{ route('boss.access') }}" method="POST">
                        @method('GET')
                        <div class="form-row  pt-5">
                            <div class="offset-1 col-lg-10 control-form">
                                <input type="text" name="user" class="inp px-3 animate__animated animate__fadeInDown"
                                    placeholder="Username..." id="username">
                                {{-- <i class="fas fa-check-circle"></i>
                                <i class="fas fa-exclamation-circle"></i> --}}
                                <br>
                                <small>Error message</small>

                            </div>
                        </div>
                        <div class="form-row pt-3">
                            <div class="offset-1 col-lg-10 control-form">
                                <input type="password" name="password"
                                    class="inp px-3 animate__animated animate__fadeInDown" placeholder="Password..."
                                    id="password">
                                    {{-- <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-exclamation-circle"></i> --}}
                                    <br>
                                    <small>Error message</small>
                            </div>
                        </div>
                        <div class="form-row pt-4 pb-3">
                            <div class="offset-1 col-lg-10">
                                <button type="submit" class="btn1 animate__animated animate__fadeInDown">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <p class="animate__animated animate__fadeInDown">
                        You do not have an account? <a href="{{ route('boss.form') }}">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('/') }}/js/validationLogin.js"></script>
</body>
</html>
