<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Kampit</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <li class="nav-item">
            <a class="nav-link" href="{{route('products.index')}}">
                <span>products page</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

    {{--is_admin--}}
    @auth
        @if(Auth::user()->can('role:admin'))
            <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                       aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>User management</span>
                    </a>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                         data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{route('admin.users.index')}}">Users list</a>
                            <a class="collapse-item" href="{{route('roles.index')}}">Roles</a>
                        </div>
                    </div>
                </li>
        @endif
    @endauth

    <!-- Nav Item - Utilities Collapse Menu -->
        {{--        is_admin and moderator--}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Content management</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('admin.cart.index')}}">Cart</a>
                    <a class="collapse-item" href="{{route('admin.categories.index')}}">Categories</a>
                    <a class="collapse-item" href="{{route('admin.products.index')}}">Products</a>
                </div>
            </div>
        </li>
    {{--        @if(Auth::user()->hasRole('seller'))--}}
    {{--        <li class="nav-item">--}}
    {{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
    {{--               aria-expanded="true" aria-controls="collapseUtilities">--}}
    {{--                <i class="fas fa-fw fa-wrench"></i>--}}
    {{--                <span>My products</span>--}}
    {{--            </a>--}}
    {{--            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
    {{--                 data-parent="#accordionSidebar">--}}
    {{--                <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                    <a class="collapse-item" href="{{route('admin.product')}}">Products</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </li>--}}
    {{--        @endif--}}

    <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->


    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @auth<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>@endauth
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div>
                            @auth
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @endauth
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}}"></script>

</body>

</html>
