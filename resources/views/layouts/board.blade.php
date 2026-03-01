<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - Dashboard</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-text mx-3">Go to home</div>
            </a>
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('student.home') }}" style="text-align: center ">
                    <span>Study</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('student.class.index') }}">
                    <i class="fas fa-envelope fa-fw mr-2 text-gray-400"></i>
                    <span>Classes</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('student.exam.index') }}">
                    <i class="fas fa-envelope fa-fw mr-2 text-gray-400"></i>
                    <span>Exams</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Account</span></a>
                </a>
                <div id="account" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a href="{{ route('student.account.edit-profile') }}" class="collapse-item">Change your
                            infomation</a>
                        <a href="{{ route('student.account.edit-password') }}" class="collapse-item">Change your
                            password</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('student.notification.index') }}">
                    <i class="fas fa-envelope fa-fw mr-2 text-gray-400"></i>
                    <span>Notifications </span></a>
            </li>
            <li class="nav-item">

                <a class="nav-link " style="cursor: pointer"
                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout </span></a>
            </li>

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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow ">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="flex-col">

                                    <img class="img-profile rounded-circle"
                                        src="{{ Auth::guard('web')->user()->url_avatar }}">
                                    <div class="dashboard-fullname"><strong>{{ Auth::guard('web')->user()->fullname }}
                                        </strong></div>
                                </div>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                                <a style="cursor: pointer" class="dropdown-item"
                                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
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
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Bootstrap core JavaScript-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            const questions = [];
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#formSelectLevel').on('submit',function(e){
                e.preventDefault();
                var exam_id = $(this).data('id')
                
                var countDownDate = new Date();
                countDownDate.setMinutes(countDownDate.getMinutes() + parseInt(document.getElementById('minute').innerHTML));

                $.ajax({
                    method: 'get',
                    url: '/profile/exam/questions/' + exam_id,
                    data: $(this).serialize(),
                    cache: false,
                    success: function(data){
                        $('#formSelectLevel').remove();
                        if(Object.keys(data).length == 10)
                        {
                            Object.keys(data).forEach(key => {
                                $('#questions').append('<div class="multiple-question-item">' +
                                    '<div class="question-box">' +
                                        '<div class="multiple-question__text">' +
                                            '<div class="row">' +
                                                '<div class="col-sm-2">Câu '+ (parseInt(key) + parseInt(1)) +':</div>' +
                                                '<div class="col-sm-10">'+ data[key].name +'</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="option-box"></div>' +
                                    '<div class="multiple-choice">' +
                                        '<div class="container-choice">' +
                                            '<div class="row m-right">' +
                                                '<div class="col-sm-6 ">' +
                                                    '<label class="radio-inline ">' +
                                                        '<input class="answer" type="radio" name="id'+ data[key].id +'" value="'+ data[key].answer_1 +'" class="check-box">' +
                                                        '<span>A: '+ data[key].answer_1 +'</span></label>' +
                                                '</div>' +
                                                '<div class="col-sm-6 ">' +
                                                    '<label class="radio-inline ">' +
                                                        '<input class="answer" type="radio" name="id'+ data[key].id +'" value="'+ data[key].answer_2 +'" class="check-box">' +
                                                        '<span>B: '+ data[key].answer_2 +'</span></label>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="row m-right">' +
                                                '<div class="col-sm-6 ">' +
                                                    '<label class="radio-inline ">' +
                                                        '<input class="answer" type="radio" name="id'+ data[key].id +'" value="'+ data[key].answer_3 +'" class="check-box">' +
                                                        '<span>C: '+ data[key].answer_3 +'</span></label>' +
                                                '</div>' +
                                                '<div class="col-sm-6 ">' +
                                                    '<label class="radio-inline ">' +
                                                        '<input class="answer" type="radio" name="id'+ data[key].id +'" value="'+ data[key].answer_4 +'" class="check-box">' +
                                                        '<span>D: '+ data[key].answer_4 +'</span></label>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>');
                            })
                            $('#questions').append('<button type="submit" id="btn_submit_exam" data-id="'+ exam_id +'" class="btn__default btn--success" style="margin-top: 20px;">Submit</button>');

                            // Update the count down every 1 second
                        x = setInterval(function() {

                            // Get today's date and time
                            var now = new Date().getTime();
                                
                            // Find the distance between now and the count down date
                            var distance = countDownDate - now;
                                
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                            // Output the result in an element with id="time"
                            document.getElementById("time").innerHTML =minutes + "m " + seconds + "s ";
                                
                            // If the count down is over, write some text 
                            if (distance < 0) {
                                clearInterval(x);
                                
                                $('#btn_submit_exam').click()
                            }
                            }, 1000);
                        }
                    }
                });
            })

            });

            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
                document.getElementById('blah').classList.remove('d-none');
            }

            
                
            
        </script>

<!-- 🔒 CHẶN COPY CODE -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const code = document.getElementById("lesson-code");

    if (code) {

        // ❌ chặn bôi đen
        code.style.userSelect = "none";

        // ❌ chặn copy
        code.addEventListener("copy", function(e) {
            e.preventDefault();
        });

        // ❌ chặn Ctrl + C
        code.addEventListener("keydown", function(e) {
            if (e.ctrlKey && (e.key === "c" || e.key === "C")) {
                e.preventDefault();
            }
        });

        // ❌ chặn chuột phải
        code.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        });

    }
});
</script>

</body>
</html>