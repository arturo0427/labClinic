<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Laboratorio Clínico "El Ángel"</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/frontend/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/frontend/img/favicon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Vesperr - v2.2.1
    * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
        {{--        <h1 class="text-light"><a href="index.html"><span>Laboratorio Clínico</span></a></h1>--}}
        <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#"><img src="{{asset('assets/frontend/img/logo_inicio.png')}}" class="img-fluid"></a>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#about">Sobre Nosotros</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#contact">Contacto</a></li>

                <li class="get-started"><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Laboratorio Clínico<br>"El Ángel"</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">El mejor laboratorio del norte del país</h2>
                <div data-aos="fade-up" data-aos-delay="800">
                    <a href="#services" class="btn-get-started scrollto">Servicios</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                <img src="{{asset('assets/frontend/img/hero-img.png')}}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <hr style="width:50%" data-aos="fade-up" data-aos-delay="150">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Sobre Nosotros</h2>
                <p>Más de 20 años junto a ti</p>
            </div>
            <div class="row content">
                <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="150">
                    <h3>Misión</h3>
                    <p style="text-align: justify">
                        Contribuir con el mejoramiento de la calidad de vida de la población del cantón Espejo,
                        atendiendo las necesidades de
                        servicios de análisis clínicos en todos los rincones, proporcionando resultados confiables y
                        oportunos, con un equipo
                        profesional altamente calificado y de gran calidad humana.
                    </p>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <h3>Visión</h3>
                    <p style="text-align: justify">
                        Ser el laboratorio clínico líder a nivel local, reconocido por su experiencia, excelencia en
                        servicio, calidad, ética
                        y profesionalismo.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Servicios</h2>
                <p>Se ofrece servicios de laboratorio de análisis clínico médico</p>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-donate-heart"></i></div>

                        {{--                        <h4 class="title"><a href="">Tipos de exámenes</a></h4>--}}
                        <ul class="description">
                            <li>Fosfatasa Alcalina</li>
                            <li>Biometría Hemática</li>
                            <li>Grupo Sanguineo</li>
                            <li>Glucosa</li>
                            <li>Colesterol</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-health"></i></div>

                        <ul class="description">
                            <li>Trigliceridos</li>
                            <li>Transaminasas</li>
                            <li>Urea, Creatinina</li>
                            <li>Ácido Úrico</li>
                            <li>Colinesterasa</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-heart"></i></div>

                        <ul class="description">
                            <li>Tuberculosis</li>
                            <li>VDRL</li>
                            <li>Helicobacter Pilory</li>
                            <li>PSA</li>
                            <li>EMO</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-paste"></i></div>
                        <ul class="description">
                            <li>Sida</li>
                            <li>Prueba de Embarazo</li>
                            <li>Sangre Oculta</li>
                            <li>Coproparasitario</li>
                            <li>ASTO, PCR, FR</li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>Contacto</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-about">
                        <h3>Laboratorio Clínico<br> "El Ángel"</h3>
                        <p>Propietaria <br> Lic. María Meza</p>
                        <p>Personal Técnico <br> Gabriela Pazmiño</p>
                        <p>Horario de atención</p>
                        <p>Lunes a Viernes <br> 07:30 am. a 06:00 pm</p>
                        <p>Sábado <br> 08:00 am. a 02:00 pm</p>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">

                </div>

                <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="info">
                        <div>
                            <i class="ri-map-pin-line"></i>
                            <p>Abraham Herrera 08-20 y Quiroga <br> El Ángel - Carchi</p>
                        </div>

                        <div>
                            <i class="ri-mail-send-line"></i>
                            <p>labclinicoelangel@outlook.com</p>
                        </div>

                        <div>
                            <i class="ri-phone-line"></i>
                            <p>06 2977707<br>+593 994225139<br>+593 981441889</p>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 text-lg-left text-center">

            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                    <a href="#intro" class="scrollto">Inicio</a>
                    <a href="#about" class="scrollto">Sobre Nosotros</a>
                </nav>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/frontend/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('assets/frontend/vendor/aos/aos.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/frontend/js/main.js')}}"></script>

</body>

</html>
