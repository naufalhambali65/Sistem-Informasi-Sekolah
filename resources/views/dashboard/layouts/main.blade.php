<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>KidKinder - Kindergarten Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="/kidkinderResource/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />

    <!-- Flaticon Font -->
    <link href="/kidkinderResource/lib/flaticon/font/flaticon.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="/kidkinderResource/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="/kidkinderResource/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/kidkinderResource/css/style.css" rel="stylesheet" />

    {{-- boostrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  </head>

  <body>
    @include('dashboard.layouts.navbar')
    @include('dashboard.layouts.header')

    @yield('container')



    <!-- Footer Start -->
    <div
      class="container-fluid justify-content-center bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"
    >
      <div class="row pt-5 justify-content-center">
        <div class="col-lg-3 col-md-6 mb-5">
          <a
            href=""
            class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
            style="font-size: 40px; line-height: 40px"
          >
          <i class="bi bi-book-half"></i>
            <span class="text-white">Tadika Mesra</span>
          </a>
          <p>
            Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea
            dolor et magna dolor, elitr rebum duo est sed diam elitr. Stet elitr
            stet diam duo eos rebum ipsum diam ipsum elitr.
          </p>
          <div class="d-flex justify-content-start mt-4">
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-twitter"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a
              class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
              style="width: 38px; height: 38px"
              href="#"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Get In Touch</h3>
          <div class="d-flex">
            <h4 class="fa fa-map-marker-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Address</h5>
              <p>123 Street, New York, USA</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-envelope text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Email</h5>
              <p>info@example.com</p>
            </div>
          </div>
          <div class="d-flex">
            <h4 class="fa fa-phone-alt text-primary"></h4>
            <div class="pl-3">
              <h5 class="text-white">Phone</h5>
              <p>+012 345 67890</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
          <h3 class="text-primary mb-4">Quick Links</h3>
          <div class="d-flex flex-column justify-content-center">
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Home</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>About Us</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Our Classes</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Our Teachers</a
            >
            <a class="text-white mb-2" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Our Blog</a
            >
            <a class="text-white" href="#"
              ><i class="fa fa-angle-right mr-2"></i>Contact Us</a
            >
          </div>
        </div>
      </div>
      <div
        class="container-fluid pt-5"
        style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;"
      >
        <p class="m-0 text-center text-white">
          &copy;
          <a class="text-primary font-weight-bold" href="#">Your Site Name</a>.
          All Rights Reserved.

          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          Designed by
          <a class="text-primary font-weight-bold" href="https://htmlcodex.com"
            >HTML Codex</a
          >
          <br />Distributed By:
          <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"
      ><i class="fa fa-angle-double-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/kidkinderResource/lib/easing/easing.min.js"></script>
    <script src="/kidkinderResource/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/kidkinderResource/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/kidkinderResource/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/kidkinderResource/mail/jqBootstrapValidation.min.js"></script>
    <script src="/kidkinderResource/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/kidkinderResource/js/main.js"></script>
  </body>
</html>

