<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">@if(\Auth::user())
                        {{Auth::user()->name}}
                        @endif</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        {{-- <li><a href="{{ route('settings.index') }}" class="dropdown-item">Pengaturan</a></li> --}}
                        <li><a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Keluar
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-{{ $tema ?? 'light' }}-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link pl-3">
                @if($image ?? '')
                <img src="{{ asset('storage/' . $image ?? '') }}" alt="Logo" width="40px" height="40px"
                    style="object-fit: cover" class="img-circle elevation-3 mr-1" style="opacity: .8">
                @else
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" width="50px" height="50px"
                    style="object-fit: cover" class="img-circle elevation-3 mr-1" style="opacity: .8">
                @endif
                <span class="brand-text font-weight-bold">{{ $title ?? 'Si - Futsal' }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="pl-3">
                        @if(Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="img-circle elevation-2"
                            alt="User Foto" style="object-fit: cover">
                        @else
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                        @endif
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-header">MAIN MENU</li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ Request::path() == 'home' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @can('isAdmin')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ Request::path() == 'users' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manage Users
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}"
                                class="nav-link {{ Request::path() == 'categories' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Manage Harga
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}"
                                class="nav-link {{ Request::path() == 'customers' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-futbol"></i>
                                <p>
                                    Manage Tim
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}"
                                class="nav-link {{ Request::path() == 'orders' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Manage Jadwal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders.success') }}"
                                class="nav-link {{ Request::path() == 'orders/success' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-check"></i>
                                <p>
                                    Manage Pertandingan
                                </p>
                            </a>
                        </li>
                        @elsecan('isStaff')
                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}"
                                class="nav-link {{ Request::path() == 'customers' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-futbol"></i>
                                <p>
                                    Manage Tim
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}"
                                class="nav-link {{ Request::path() == 'orders' ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Manage Jadwal
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('page-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="https://www.facebook.com/ahfasx.parigy/" target="_blank">Muchamad Ahfas</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    @yield('script')
    <!-- Sweetalert realrashid -->
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>

</html>