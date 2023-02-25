<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iCope - Integrated care for older people</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/toastr.min.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Arsha - v4.9.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>
    .hide{
        display: none;
    }
</style>
@yield('css')
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
          <div class="container d-flex align-items-center">


            <!-- Uncomment below if you prefer to use an image logo -->
           <a href="{{route('user.home')}}" class="logo me-auto"><img src="{{asset('assets/img/headLogo.png')}}" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
              <ul>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.forword')?'active':''}}" href="{{route('user.forword')}}">Foreword</a></li>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.preface')?'active':''}}" href="{{route('user.preface')}}">Preface</a></li>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.module')?'active':''}}" href="{{route('user.module')}}">Modules</a></li>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.post.assessment')?'active':''}}" href="{{route('user.post.assessment')}}">Post Assessment</a></li>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.acronyms')?'active':''}}" href="{{route('user.acronyms')}}">Acronyms and abbreviations</a></li>
                <li><a class="nav-link scrollto {{(\Request::route()->getName()=='user.population')?'active':''}}" href="{{route('user.population')}}">Population Ageing </a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

          </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        {{-- @include('/layouts/partials/slider') --}}


        @yield('content')
        <!-- ======= Footer ======= -->
        <footer id="footer">


          <div class="container footer-bottom clearfix">
          <img src="{{asset('assets/img/whoLogo.png')}}">
          </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/js/toastr.min.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

<script>
  @if(Session::has('message'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
      "closeButton" : true,
      "progressBar" : true
  }
          toastr.warning("{{ session('warning') }}");
  @endif
</script>
<script>
    $.fn.closeModal = function(elem) {
        $('#'+elem).modal('hide');
        $(location).attr('href', '{{route('user.module')}}');
    }
</script>
  @yield('js')
</body>

</html>
