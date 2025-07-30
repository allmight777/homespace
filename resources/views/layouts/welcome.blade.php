<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>HomeSpace</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images/image_1.webp') }}" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Swiper Slider -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" rel="stylesheet">

    <!-- Glightbox -->
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HomeSpace
  * Template URL: https://bootstrapmade.com/homespace-bootstrap-real-estate-template/
  * Updated: Jul 05 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

    <style>
        #main {
            background-color: #e7f7e9;
        }
    </style>
</head>

<body class="index-page">



    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.webp" alt=""> -->
                <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="bgCarrier" stroke-width="0"></g>
                    <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="iconCarrier">
                        <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path
                            d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M4 22V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        <path d="M20 9.5V13.5M20 22V17.5" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round"></path>
                        <path
                            d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                        <path
                            d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z"
                            stroke="currentColor" stroke-width="1.5"></path>
                    </g>
                </svg>
                <h1 class="sitename">HomeSpace</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('welcome') }}" class="active">Home</a></li>
                    <li><a href="{{ route('maison') }}">Appartements</a></li>
                    <li><a href="{{ route('service') }}">Services</a></li>
                    <li><a href="{{ route('agent') }}">Agents</a></li>
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                    <li class="dropdown"><a href="#"><span>More Pages</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>

                            <li><a href="{{ route('terms') }}">Terms</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy</a></li>
                            <li><a href="{{ route('abouts') }}">About</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    {{--   <li>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"
                                style="padding: 0.25rem 0.75rem; font-size: 1rem;">
                                Logout
                            </button>
                        </form>
                    </li>  --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main" id="main">



        @yield('content')

    </main>


    <footer id="footer" class="footer accent-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('welcome') }}" class="logo d-flex align-items-center">
                        <span class="sitename">HomeSpace</span>
                    </a>
                    <p>Découvrez des opportunités uniques adaptées à vos besoins. Nos experts vous accompagnent pour
                        trouver le logement idéal rapidement et en toute confiance.</p>

                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('welcome') }}">Home</a></li>
                        <li><a href="{{ route('contact') }}">About us</a></li>
                        <li><a href="{{ route('service') }}">Services</a></li>
                        <li><a href="{{ route('terms') }}">Terms of service</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                        <li><a href="{{ route('register') }}">Inscription</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                 
                    <p>Cadjehoun, Gbegamey</p>
                    <p>Bénin</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+229 01 94849958</span></p>
                    <p><strong>Email:</strong> <span>agoliganange15@gmail.com</span></p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <!-- Bootstrap Bundle (JS + Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- PHP Email Form Validation (ce script est souvent local, pas sur CDN) -->
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- PureCounter -->
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>

    <!-- imagesLoaded -->
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>

    <!-- Isotope Layout -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <!-- Glightbox -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>


    <!-- Main JS File -->
    <script src="{{ asset('js/welcome.js') }}"></script>


</body>

</html>
