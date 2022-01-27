<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">


</head>

<body>
    <header>
        <div class="logo">
            <a href="{{ url('/') }}">
                <h1 class="logo-text"><span>Yosri </span>Blog</h1>
            </a>

        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/post/recent') }}">recent</a></li>
            <li><a href="#footer">A propos</a></li>
        </ul>
    </header>

    @yield('content')


    <!-- footer -->
    <div id="footer" class="footer">
        <div class="footer-content">

            <div class="footer-section about">
                <h1 class="logo-text"><span>Yosri</span>Blog</h1>
                <p>
                    Lorem ipsum is a placeholder text commonly used to demonstrate
                    the visual form of a document or a typeface without relying on meaningful content.
                </p>
                <div class="contact">
                    <span><i class="fas fa-phone"></i> &nbsp; 123-456-789</span>
                    <span><i class="fas fa-envelope"></i> &nbsp;hjel.abderrazak@gmail.com</span>
                </div>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section links">
                <!--     <h2>Quick Links</h2>
                <br>
                <ul>
                    <a href="#">
                        <li>Events</li>
                    </a>
                    <a href="#">
                        <li>Team</li>
                    </a>
                    <a href="#">
                        <li>Mentores</li>
                    </a>
                    <a href="#">
                        <li>Gallery</li>
                    </a>
                    <a href="#">
                        <li>Terms and Conditions</li>
                    </a>
                </ul> -->
            </div>

            <div class="footer-section contact-form">
                <h2>Contact us</h2>
                <br>
                <form method="post" action="{{ url('sendemail/send') }}">
                    <input type="email" name="email" class="text-input contact-input"
                        placeholder="Your email address...">
                    <textarea rows="4" name="message" class="text-input contact-input"
                        placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Send
                    </button>
                </form>
            </div>

        </div>

        <div class="footer-bottom">
            &copy; HjalDev
        </div>
    </div>
    <!-- // footer -->



</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Slick Carousel -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Custom Script -->
<script src="js/scripts.js"></script>

</html>
