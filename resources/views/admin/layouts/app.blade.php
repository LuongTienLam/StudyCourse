<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>
    <link rel="icon" href="https://AMREL.vn/wp-content/themes/viettech/img/front/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/doasboard.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-green sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
                <div class="sidebar-brand-text mx-3">
                    Admin </div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            @auth('admin')
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.home') }}" style="text-align: center ">

                    <span>Dashboard</span></a>
                    
            </li>
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            @if(Auth::guard('admin')->user()->role == 'Manager')

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.course.index') }}">
                    <i class="fas fa-graduation-cap  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Course Management</span>
                    
            <li class="nav-item">
                <a class="nav-link" href="/admin/registrations">
                    <span>Registrations</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.class.index') }}">
                    <i class="fas fa-graduation-cap  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Class Management</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.lesson.index') }}">
                    <i class="fas fa-graduation-cap  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Lesson Management</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.notification.index') }}">
                    <i class="fas fa-envelope fa-fw mr-2 text-gray-400"></i>
                    <span>Notification Management</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.exam.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Exam Management</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.question.index') }}">
                    <i class="fas fa-graduation-cap  fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Question Management</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.student.index.manager') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Student Management</span>
                </a>

            </li>
            
            @endif
            <!-- Nav Item - Utilities Collapse Menu -->
            @if(Auth::guard('admin')->user()->role == 'Admin')

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.manager.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Admin Management</span>
                </a>
            </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Account</span></a>
                </a>
                <div id="account" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="{{ route('admin.account.edit-profile') }}" class="collapse-item">Change Your Infomation</a>
                        <a href="{{ route('admin.account.edit-password') }}" class="collapse-item">Change Your Password</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">

                <a class="nav-link " style="cursor: pointer" onclick="event.preventDefault(); document.querySelector('#admin-logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li>
            @endauth

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <!-- Sidebar Message -->
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @auth('admin')
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><strong>{{ Auth::guard('admin')->user()->fullname }} ( {{ Auth::guard('admin')->user()->role }} )</strong></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a style="cursor: pointer" class="dropdown-item" onclick="event.preventDefault(); document.querySelector('#admin-logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="admin-logout-form" action="{{route('admin.logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endauth
                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container">
                    @yield('content')
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2026</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Bootstrap core JavaScript-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#price').on('blur', function() {
                        const value = this.value.replace(/,/g, '');
                        this.value = parseFloat(value).toLocaleString('en-US', {
                            style: 'decimal',
                            maximumFractionDigits: 2,
                            minimumFractionDigits: 2
                        });
                    });
                })
                imgInp.onchange = evt => {
                    const [file] = imgInp.files
                    if (file) {
                        blah.src = URL.createObjectURL(file)
                    }
                    document.getElementById('blah').classList.remove('d-none');
                }
            </script>
</body>

</html>