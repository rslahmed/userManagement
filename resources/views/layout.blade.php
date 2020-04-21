
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Management</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Your custom styles (optional) -->
    <style>

    </style>
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-3">
                <div class="text-center">
                    <a href="#" class="pl-0"><img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png"></a>
                </div>
            </li>

            <!-- Search Form -->
            <li>
                <form class="search-form" role="search">
                    <div class="md-form mt-0 waves-light">
                        <input type="text" class="form-control py-2" placeholder="Search">
                    </div>
                </form>
            </li>

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">

                    <li>
                        <a href="{{route('home')}}" class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-tachometer-alt"></i>Dashboards
                        </a>

                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-user"></i>User<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{ route('register') }}" class="waves-effect">Add User</a>
                                </li>
                                <li>
                                    <a href="{{route('user.all')}}" class="waves-effect">View User</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa far fa-check-square"></i>Role<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="{{route('role.add')}}" class="waves-effect">Add Role</a>
                                </li>
                                <li>
                                    <a href="{{route('role.all')}}" class="waves-effect">View Role</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{route('activity.log')}}" class="collapsible-header waves-effect"><i class="w-fa far fa-bell"></i>Activity log</a>
                    </li>

                </ul>
            </li>
            <!-- Side navigation links -->

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Dashboard v.1</p>
        </div>

        <div class="d-flex change-mode">

            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
            </div>

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown -->
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="badge red">3</span> <i class="fas fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="fas fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="#">My account</a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->

</header>
<!-- Main Navigation -->

<!-- Main layout -->
<div class="preloader">
    <img src="{{asset('img/preloader.gif')}}" alt="">
</div>
<main>

    @yield('content')

</main>
<!-- Main layout -->


<!-- SCRIPTS -->
<!-- JQuery -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.js')}}"></script>

<!-- Initializations -->
<script>
$(document).ready(function(){
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    Ps.initialize(container, {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
        $('.mdb-select').material_select();
    });

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    @if (Session::has('success'))
        toastr.success('{{Session::get('success')}}');
    @elseif(Session::has('warning'))
        toastr.warning('{{Session::get('warning')}}');
    @elseif(Session::has('error'))
        toastr.error('{{Session::get('error')}}');
    @endif

    // check for error
    $(document).ready(function(){
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        toastr.error('{{$error}}');
        @endforeach
        @endif
    })

    //delete confirm
    $(document).on('click', '.delete_btn', function (e) {
        e.preventDefault();
        let deleteLink = $(this).attr('href');
        swal({
                title: "Are you sure?",
                text: "This Role will be deleted",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                // $('.preloader').show();
                swal("Deleted!", "This Role has been deleted.", "success");
                window.location = deleteLink;
            });
    })
})
</script>


@yield('script')

</body>

</html>
