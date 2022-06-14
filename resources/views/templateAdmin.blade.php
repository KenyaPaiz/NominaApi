@php
    session();
@endphp
@include('resources')
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <!-- <h1 class="fs-4"><span class="bg-white text-dark rounded shadow px-2 me-2">BS</span> <span class="text-white">Boss Profile</span></h1> -->
                <h1 class="fs-4"> <span class="rounded shadow px-3 me-2 text-white">Admin Profile</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa-solid fa-bars-staggered"></i></button>
            </div>

            <ul class="list-unstyled px-2">
                <li class=""><a href="{{ route('boss.table') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-eye"></i>
                        Show Boss</a></li>
            </ul>
            <hr class="h-color mx-2">

            <ul class="lust-unstyled px-2">
                <li class=""><a href="{{ route('login.view') }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign out</a></li>
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
                                <p class="name-profile">
                                    Welcome 
                                    @php
                                        //get boss name for log ing
                                        echo session('adminName');
                                    @endphp
                                </p>
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
<script src="{{ url('/') }}/js/bootstrap.min.js"></script>
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
