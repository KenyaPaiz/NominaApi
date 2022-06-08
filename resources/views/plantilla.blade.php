<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/')}}/css/main.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/boss_register.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/register_company.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/register_employee.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <!-- <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">BS</span> <span class="text-white">Boss Profile</span></h1> -->
                <h1 class="fs-4"> <span class="rounded shadow px-3 me-2 text-white">Boss Profile</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-building"></i> Register Company</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i
                            class="fa-solid fa-users"></i> Register Employee</a></li>
                <li class=""><a href="{{ route('employe.table3') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-eye"></i>
                        Show Employee</a></li>
                <li class=""><a href="{{ route('company.table2') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-eye"></i>
                        Show Company</a></li>
            </ul>
            <hr class="h-color mx-2">

            <ul class="lust-unstyled px-2">
                <li class=""><a href="./index.html" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">

                        <a class="navbar-brand fs-4" href="#">Boss Profile</a>
                        <button class="btn px-1 py-0 open-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav  mb-2 mb-lg-0 ">
                            <li class="nav-item  ">
                                <!-- <a class="nav-link active" aria-current="page" href="#">Profile</a> -->
                                <p class="name-profile">Mathew Morgan</p>
                            </li>
                            <li>
                                <div class="img-perfil"></div>
                            </li>



                        </ul>

                    </div>
                </div>
            </nav>
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/0ef283508d.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(".sidebar ul li").on('click', function () {
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');
    });

    $('.open-btn').on('click', function(){
            $('.sidebar').addClass('active');
        });

        $('.close-btn').on('click', function(){
            $('.sidebar').removeClass('active');
        });
</script>
</html>