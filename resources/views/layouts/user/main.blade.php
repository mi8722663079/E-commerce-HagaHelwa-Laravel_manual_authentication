<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Start Links -->
    <link rel="stylesheet" href="{{ asset('css/splide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/splide-core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!--Start Home Style -->
    <link rel="stylesheet" href="{{ asset('css/index_style.css') }}">
    <!-- End Home Style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Start Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:ital,wght@1,400&display=swap" rel="stylesheet">
    <!-- End Google Fonts -->

    <!-- End Links -->

    <title>Haga Helwa</title>

</head>

<body>

    <!-- Start header -->

    <section id="header">

        <a href="{{ url('index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="homeLogo">
        </a>
        <div>
            <ul id="navbar">
                <li class="link">
                    <a href="{{ route("index") }}">Home</a>
                </li>
                <li class="link">
                    <a href="{{ url('shop') }}">Shop</a>
                </li>
                <li class="link">
                    <a class="active " href="{{ url('blog') }}">Blog</a>
                </li>
                <li class="link">
                    <a href="{{ url('about') }}">About</a>
                </li>
                <li class="link">
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
            @auth
            <form action="{{ route("auth.logout") }}" method="post">
                @csrf
                <li class="link">
                    <button type="submit" style="background: none;border: none;padding: 0;">Logout</button>
                </li>
                    </form>
            @endauth
                @guest
                <li class="link">
                    <a href="{{ route("auth.reg") }}">signup</a>
                </li>
                <li class="link">
                    <a href="{{ route("login") }}">login</a>
                </li>
                @endguest
                <li class="link">
                    <a id="lg-cart" href="{{ url('cart') }}">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
                <a href="#" id="close"><i class="fas fa-times"></i></a>
            </ul>


        </div>
        <div id="mobile">
            <a href="{{ url('cart') }}">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
        </div>
    </section>

    <!-- End header -->
@yield("content")
    <footer class="section-p1">
        <div class="col">
            <h4>Contact</h4>
            <p><strong>Address: </strong>526 manchster Road, street 32, manchster</p>
            <p><strong>Phone: </strong>0106244875</p>
            <p><strong>Hourse: </strong>10AM - 10Pm, Sat- thus</p>
            <div class="follow">
                <h4>Follow US :</h4>
                <div class="icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

        </div>
        <div class="col">
            <h4>About Us</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery information</a>
            <a href="#">Privacy policy</a>
            <a href="#">Terms & Condtions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">View Cart</a>
            <a href="#">My Whishlist</a>
            <a href="#">Track My order</a>
            <a href="#">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store Or Google Play</p>
            <div class="oo">
                <img src="img/pay/app.jpg " alt=" ">
                <img src="img/pay/play.jpg " alt=" ">
            </div>
            <p>Secure payment For your happy Service</p>
            <img src="img/pay/pay.png " alt=" ">
        </div>

        <div class="copyright">
            <p> all The right reserved for OmarTurbo, 2022</p>
        </div>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
</body>



</html>
