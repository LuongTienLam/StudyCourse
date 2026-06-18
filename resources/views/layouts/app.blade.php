<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Course Online</title>

    <link rel="icon" href="/images/logo.png" type="image/png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>

    <!-- HEADER -->
    <header class="main-header">
        <div class="container">
            <nav class="main-navbar">
                <a href="{{ route('home') }}" class="brand-logo">
                    <img src="/images/logo.png" alt="SKYLAB CODING">
                </a>

                <ul class="main-menu">
                    <li class="main-menu-item">
                        <a href="{{ route('home') }}" class="main-menu-link active">HOME</a>
                    </li>
                    <li class="main-menu-item">
                        <a href="#" class="main-menu-link">ABOUT US</a>
                    </li>
                    <li class="main-menu-item">
                        <a href="#" class="main-menu-link">COURSE</a>
                    </li>
                    <li class="main-menu-item">
                        <a href="#" class="main-menu-link">NEWS</a>
                    </li>
                    <li class="main-menu-item">
                        <a href="#" class="main-menu-link">CAREERS</a>
                    </li>
                </ul>

                <div class="main-auth">
                    @guest
                        <a href="{{ route('login') }}" class="login-btn">
                            <i class="fas fa-sign-in-alt"></i> LOGIN
                        </a>
                    @else
                        <div class="dropdown">
                            <a class="user-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::guard('web')->user()->url_avatar }}" class="user-avatar" alt="">
                                <span>{{ Auth::guard('web')->user()->fullname }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('student.home') }}">
                                    <i class="far fa-user mr-2"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </nav>
        </div>
    </header>

    <!-- HERO BANNER (CHỈ CÒN ẢNH, KHÔNG CÒN TEXT) -->
    <section class="hero-banner">
        <div class="hero-overlay"></div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="main-page">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-list">
                <div class="footer-item">
                    <img src="/images/logo.png" alt="" class="footer-img">
                    <ul class="footer-item-body">
                        <li class="footer-sub">Tax number: 04016231</li>
                        <li class="footer-sub">Office: 154 Pham Nhu Xuong, Da Nang</li>
                        <li class="footer-sub">Location: 263 Tieu La, Da Nang</li>
                        <li class="footer-sub">Location: 52 Tran Phu, Hue</li>
                        <li class="footer-sub">Hotline: 0777710005</li>
                    </ul>
                </div>

                <div class="footer-item">
                    <div class="footer-item-title footer-title--separate">Contact</div>
                    <ul class="footer-item-icon">
                        <li class="footer-sub-icon"><i class="fab fa-facebook"></i></li>
                        <li class="footer-sub-icon"><i class="fab fa-instagram"></i></li>
                        <li class="footer-sub-icon"><i class="far fa-envelope"></i></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            © 2026 Copyright:
            <a class="footer-link" href="#">HDTC Team</a>
        </div>
    </footer>

    <!-- CHATBOT -->
    <div class="chatbox">
        <div class="chatbox__support" style="display:none;">
            <div class="chatbox__header">
                <div class="chatbox__image--header">
                    <img src="/images/image.png" alt="image">
                </div>
                <div class="chatbox__content--header">
                    <h4 class="chatbox__heading--header">Chat support</h4>
                </div>
            </div>

            <div class="chatbox__messages">
                <div id="chatbot">
                    <div class="messages__item messages__item--visitor">
                        Can you let me talk to the support?
                    </div>
                    <div class="messages__item messages__item--visitor">
                        Please type "/help" so I can support for you!
                    </div>
                </div>

                <div id="typing" class="messages__item messages__item--typing d-none">
                    <span class="messages__dot"></span>
                    <span class="messages__dot"></span>
                    <span class="messages__dot"></span>
                </div>
            </div>

            <div class="chatbox__footer">
                <form id="form_submit_chat" method="post">
                    @csrf
                    <input id="text_chat" type="text" name="text_chat" placeholder="Write a message..." autocomplete="off">
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>

        <div class="chatbox__button">
            <button type="button">Chat</button>
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    const chatButton = document.querySelector(".chatbox__button button");
    const chatSupport = document.querySelector(".chatbox__support");

    chatButton.addEventListener("click", function () {
        chatSupport.style.display = (chatSupport.style.display === "block") ? "none" : "block";
    });

    $("#form_submit_chat").on("submit", function(e) {
        e.preventDefault();

        let msg = $("#text_chat").val();
        if(msg.trim() === "") return;

        $("#chatbot").append(`
            <div class="messages__item messages__item--operator">${msg}</div>
        `);

        $("#text_chat").val("");

        $.ajax({
            url: "/chatbot/gemini",
            method: "POST",
            data: {
                message: msg,
                _token: $("meta[name='csrf-token']").attr("content")
            },
            success: function(res) {
                $("#chatbot").append(`
                    <div class="messages__item messages__item--visitor">${res.reply}</div>
                `);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                $("#chatbot").append(`
                    <div class="messages__item messages__item--visitor">Lỗi server!</div>
                `);
            }
        });
    });
</script>
    

</body>

</html>