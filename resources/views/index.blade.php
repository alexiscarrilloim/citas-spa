<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Citas MäDI Studio & Spa </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{url('dist/img/mady-ngro-bco.jpg')}}" rel="icon" class="img-circle">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <!-- <img src="{{url('dist/img/mady-ngro-bco.jpg')}}" alt="logo"> -->
        <h1 class="sitename"> MäDI Studio & Spa </h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">Acerca de</a></li>
          <li><a href="#contact">Contacto</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{url('login')}}">Ingresar</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <img src="assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in" class="">
      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-7 col-lg-9 text-center">
            <h1>Bienvenido</h1>
            <p>Al sistema de citas de MäDI Studio & Spa </p>
          </div>
        </div>
        <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
          <a href="{{url('/admin')}}" class="btn-get-started">Resevar cita</a>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Acerca de<br></h2>
        <p>MäDI Studio & Spa</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Valores que se tienen en MäDI Studio & Spa:
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span><b>Respeto:</b> Tratamos a cada cliente con la dignidad y amabilidad que se merecen.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span><b>Pasión:</b> Ponemos nuestro corazón en cada servicio que ofrecemos, asegurando la máxima satisfacción de nuestros clientes.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span><b>Rapidez y calidad:</b> Ofrecemos servicios rápidos y de alta calidad, ideales para momentos de urgencia sin comprometer la excelencia.</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>En MäDI Studio & Spa, nos dedicamos a proporcionar momentos de relajación y bienestar a través de masajes y tratamientos de belleza personalizados. Nuestro objetivo es resaltar la belleza única de cada persona, ayudándoles a sentirse renovados y confiados.</p>
            <a href="{{url('/admin')}}" class="read-more"><span>Reservar cita</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    

    <!-- About Alt Section -->
   <!-- /About Alt Section -->

  

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Servicios</h2>
        <p>Descubre una amplia gama de servicios diseñados para tu bienestar y belleza. Desde masajes relajantes hasta peinados elegantes,
           ofrecemos experiencias personalizadas que te harán sentir renovado y radiante. </p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <div class="icon">
                <img src="{{url('assets/img/masaje2.jpg')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Masajes</h3>   
              <p>Sumérgete en un estado de tranquilidad con nuestros masajes relajantes, diseñados para aliviar el estrés y la tensión acumulada.
                 Utilizando técnicas suaves y precisas.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <div class="icon">
                <img src="{{url('assets/img/facial.png')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Faciales</h3>
              <p>Revitaliza tu piel con nuestros faciales, diseñados para limpiar, hidratar y rejuvenecer tu rostro. 
                Disfruta de un tratamiento que realza tu belleza natural y te deja con una piel fresca y radiante.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <div class="icon">
                <img src="{{url('assets/img/depilar.jpg')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Depilaciones</h3>
              <p>Obtén una piel suave y libre de vello con nuestras depilaciones expertas. Ofrecemos un servicio cómodo y efectivo para que disfrutes de resultados duraderos y una piel impecable.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <div class="icon">
                <img src="{{url('assets/img/maquillaje.jpg')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Maquillajes</h3>
              <p>Destaca tu belleza con nuestros maquillajes profesionales. Ya sea para una ocasión especial o para el día a día, 
                te ayudamos a lucir radiante y seguro de ti mismo.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <div class="icon">
                <img src="{{url('assets/img/peinado.jpg')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Peinados</h3>
              <p>Luce un peinado espectacular para cualquier ocasión con nuestros expertos.
                 Creamos estilos que se adaptan a tu personalidad y resalten tu belleza natural.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <div class="icon">
                <img src="{{url('assets/img/cejas.png')}}" alt="logo" style="height: 110px; width:120px;">
              </div>
                <h3>Diseño de cejas</h3>
              <p>Logra unas cejas perfectamente definidas con nuestros servicios de diseño profesional.
                 Realzamos la forma natural de tus cejas para enmarcar tu rostro con elegancia y estilo. </p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section accent-background">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Agende su cita</h3>
              <p>Aspiramos a ser el spa líder en nuestra comunidad, conocido por brindar experiencias excepcionales y personalizadas que superen las expectativas de nuestros clientes.</p>
              <a class="cta-btn" href="{{url('/admin')}}">Reservar cita</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contacto</h2>
        <p>Estamos aquí para atenderte. Si tienes alguna pregunta o deseas agendar un servicio, no dudes en ponerte en contacto con nosotros.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15080.901863241834!2d-104.30812997876998!3d19.097762343709274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8424d5923c8e9ed7%3A0xd85453efbd2ae532!2sM%C3%A4DI%20Studio%20%26%20Spa!5e0!3m2!1ses-419!2smx!4v1725428197254!5m2!1ses-419!2smx" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-lg-10">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Dirección</h3>
                <p>C. Gaviota Mediterránea 330, 28219 Manzanillo, Col.</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Llamenos</h3>
                <p>314 163 5097</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Escribanos</h3>
                <p>madiioficial@gmail.com</p>
              </div>
            </div><!-- End Info Item -->

          </div>
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <span class="sitename">MäDI Studio & Spa </span>
          </a>
          <p>Nos encanta ser parte de tu rutina de bienestar y belleza. Síguenos en nuestras redes sociales y mantente al tanto de nuestras
             promociones y novedades. ¡Esperamos verte pronto!</p>
          <div class="social-links d-flex mt-4">
            <a href="https://www.facebook.com/p/M%C3%A4DI-Studio-Spa-100070507015498/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/madi_oficiall/"><i class="bi bi-instagram"></i></a>
            <a href="https://www.whatsapp.com/catalog/5213141635097/?app_absent=0"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Acerca de</a></li>
          </ul>
        </div>
  
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contáctenos</h4>
          <p>C. Gaviota Mediterránea 330</p>
          <p>28219 Manzanillo, Col.</p>
          <p>México</p>
          <p class="mt-4"><strong>Teléfono:</strong> <span>314 163 5097</span></p>
          <p><strong>Correo electrónico:</strong> <span>madiioficial@gmail.com</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">MäDI Studio & Spa </strong> <span>Todos los derechos reservados.</span></p>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>