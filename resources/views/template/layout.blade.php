<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        @media only screen and (max-width: 600px) {
            .h4-judul {
                display: none;
            }
        }
    </style>

    <script src="{{ asset('assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/dashboard">
                <div class="sidebar-brand-text mx-3">E-Voting HIMTIF</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ request()->segment(2) == 'database' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/database">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Calon Pemilih</span>
                </a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'kandidat' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/kandidat">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Kandidat</span>
                </a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'visimisi' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/visimisi">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    <span>Visi & Misi</span>
                </a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'user' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/user">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pemilih</span>
                </a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'suara' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/suara">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Suara</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Setting
            </div>

            <li class="nav-item {{ request()->segment(2) == 'profile' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/profile">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'waktu' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/waktu">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Waktu</span></a>
            </li>

            <li class="nav-item {{ request()->segment(2) == 'poster' ? 'active' : '' }}">
                <a class="nav-link" href="/admin/poster">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Poster</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/logoutadmin">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h5 class="h4-judul mt-2">E-VOTING PEMILIHAN KETUA DAN WAKIL KETUA HIMTIF UNIVERSITAS PAMULANG
                    </h5>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->email }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('assets/img/user.png') }}"
                                    width="60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin/profile">
                                    <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/admin/logoutadmin">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; E-Voting HIMTIF UNIVERSITAS PAMULANG</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <script src="{{ asset('assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script src="{{ asset('assets') }}/js/sb-admin-2.min.js"></script>

    {{-- <script src="{{ asset('assets') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('assets') }}/js/demo/chart-bar-demo.js"></script> --}}

    <script src="{{ asset('assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/demo/datatables-demo.js"></script>



    @yield('footer')




</body>

</html>
