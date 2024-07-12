<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tenbeat Creative</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('landing') }}/img/fav.png" rel="icon">
    <link href="{{ asset('landing') }}/img/apple.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('landing') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('landing') }}/css/home.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <a href="index.html"><img src="{{ asset('landing') }}/img/logo-tenbeat.png"></a>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="#services">Benefit</a></li>
                    <li><a class="nav-link scrollto " href="#testimonials">Testimoni</a></li>
                    <li><a style="margin-right: 270px;" class="nav-link scrollto" href="#pricing">Harga</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a style="margin-right: 30px;" class="nav-link"
                                    href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li><a style="margin-right: 30px;" class="nav-link" href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a style="margin-right: 30px;" href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container" style="margin-top: 85px; margin-bottom: 85px;">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                    data-aos="fade-up">
                    <div>
                        <h2 style=" color: rgb(31, 31, 31); font-size: 30px; margin-bottom: 0px;">Punya banyak konten
                            menarik, tapi terhambat waktu edit video? </h2>
                        <h1 style=" color: rgb(31, 31, 31); font-size: 30px; margin-bottom: 10px;">Serahin ke Tenbeat
                            Creative Aja!</h1>

                        <ul style="margin-bottom: 20px;">
                            <li>Hemat dan Mudah Digunakan</li>
                            <li>Dikerjakan oleh profesional</li>
                            <li>Cepat dan tepat waktu</li>
                            <li>Fleksibilitas tinggi</li>
                        </ul>
                        <a href="#" style="margin-right: 10px;" class="btn-get-started">Langganan Sekarang</a><a
                            style="background-color: white;  border: 1px solid black; color: black;" href="#"
                            class="btn-get-started">Gabung Mitra</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="{{ asset('landing') }}/img/landing.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <p class="title-top">MENGAPA MEMILIH TENBEAT CREATIVE ?</p>
                    <h2 class="title-main">Tepat Waktu, Mudah Digunakan, Terjangkau</h2>
                    <p>Selain itu, Tenbeat Creative juga memiliki beberapa alasan lain mengapa <br /> kamu harus
                        menggunakan Tenbeat Creative</p>
                </div>
                <div class="row">
                    <div class="col-lg-6 hero-img" data-aos="fade-left">
                        <img src="{{ asset('landing') }}/img/benefit.png" class="img-fluid" alt="Benefit Image">
                    </div>
                    <div class="col-lg-6 content" data-aos="fade-up">
                        <div class="benefit-container">
                            <img src="{{ asset('landing') }}/img/benefit1.png" class="img-fluid" alt="Benefit Image">
                            <div class="text">
                                <h4>Sistem Layanan End To End</h4>
                                <p>Semua fitur yang kamu butuhkan saling terintegrasi di sistem ini, mulai dari
                                    pembayaran, chat dengan mitra dan fitur lainnya.</p>
                            </div>
                        </div>
                        <div class="benefit-container">
                            <img src="{{ asset('landing') }}/img/benefit1.png" class="img-fluid" alt="Benefit Image">
                            <div class="text">
                                <h4>Garansi Hasil Video Berkualitas</h4>
                                <p>Kamu berhak meminta revisi jika hasil editing video tidak sesuai dengan keinginanmu.
                                </p>
                            </div>
                        </div>
                        <div class="benefit-container">
                            <img src="{{ asset('landing') }}/img/benefit1.png" class="img-fluid" alt="Benefit Image">
                            <div class="text">
                                <h4>Sistem Layanan End To End</h4>
                                <p>Terdapat layanan Booster yang memberikan efisiensi pengerjaan editing dengan
                                    pengerjaan 4 jam</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->


        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Testimonials</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi
                        quidem hic quas.</p>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> Proin iaculis purus consequat
                                    sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam,
                                    ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ asset('landing') }}/img/testimonials/testimonials-1.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> Export tempor illum tamen
                                    malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum
                                    velit fore eram velit sunt aliqua noster fugiat irure
                                    amet legam anim culpa.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ asset('landing') }}/img/testimonials/testimonials-2.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> Enim nisi quem export duis
                                    labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore
                                    quem eram duis noster aute amet eram fore quis sint
                                    minim.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ asset('landing') }}/img/testimonials/testimonials-3.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> Fugiat enim eram quae cillum
                                    dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor
                                    enim duis veniam ipsum anim magna sunt elit fore quem
                                    dolore labore illum veniam.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ asset('landing') }}/img/testimonials/testimonials-4.jpg"
                                    class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p>
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i> Quis quorum aliqua sint quem
                                    legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis
                                    sunt culpa nulla illum cillum fugiat legam esse
                                    veniam culpa fore nisi cillum quid.
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="{{ asset('landing') }}/img/testimonials/testimonials-5.jpg"
                                    class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>
                        <!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi
                        quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in">
                            <div class="pic"><img src="{{ asset('landing') }}/img/team/team-1.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pic"><img src="{{ asset('landing') }}/img/team/team-2.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="member" data-aos="zoom-in" data-aos-delay="200">
                            <div class="pic"><img src="{{ asset('landing') }}/img/team/team-3.jpg"
                                    class="img-fluid" alt=""></div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Team Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Clients</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi
                        quidem hic quas.</p>
                </div>

                <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in">
                            <img src="{{ asset('landing') }}/img/clients/client-1.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="100">
                            <img src="{{ asset('landing') }}/img/clients/client-2.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="150">
                            <img src="{{ asset('landing') }}/img/clients/client-3.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="200">
                            <img src="{{ asset('landing') }}/img/clients/client-4.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                            <img src="{{ asset('landing') }}/img/clients/client-5.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                            <img src="{{ asset('landing') }}/img/clients/client-6.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                            <img src="{{ asset('landing') }}/img/clients/client-7.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                        <div class="client-logo">
                            <img src="{{ asset('landing') }}/img/clients/client-8.png" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Clients Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Pricing</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi
                        quidem hic quas.</p>
                </div>

                <div class="row">
                    <div class="col col-lg-5 mx-auto">
                        <div class="box" data-aos="zoom-in" data-aos-delay="200">
                            <h3>Paket Sosial Media</h3>
                            <h4><sup>Rp.</sup>2.000.000<span> / bulan</span></h4>
                            <ul>
                                <li>Edit 30 video reels</li>
                                <li>Revisi sepuasnya</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn-buy">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Frequently Asked Questions</h2>
                </div>

                <ul class="faq-list">

                    <li>
                        <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a
                            erat nam at lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                                non.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque
                            varius morbi enim nunc faucibus a pellentesque? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet
                            consectetur adipiscing elit pellentesque habitant morbi? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci
                            dapibus. Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i
                                class="bi bi-chevron-up icon-close"></i></div>
                        <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in
                                cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam
                            pellentesque nec nam aliquam sem et tortor consequat? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                                ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit
                                adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                            </p>
                        </div>
                    </li>

                    <li>
                        <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus
                            faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                                class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                        </div>
                        <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo
                                integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc
                                eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                                Pellentesque
                                diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus
                                molestie nunc non blandit massa enim nec.
                            </p>
                        </div>
                    </li>

                </ul>

            </div>
        </section>
        <!-- End Frequently Asked Questions Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Scaffold</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/scaffold-bootstrap-metro-style-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('landing') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('landing') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('landing') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('landing') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('landing') }}/js/main.js"></script>

</body>

</html>
