<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
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
<style>
    /* Center the loader */
    #loader {
        display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 999;
    background: rgba(255,255,255,0.8) url("./assets/img/loading.gif") center no-repeat;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 }
      to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom {
      from{ bottom:-100px; opacity:0 }
      to{ bottom:0; opacity:1 }
    }

    #myDiv {
      display: none;
      text-align: center;
    }
    </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body class="bg-light landing">
    <div id="loader"></div>


  <!-- ======= Hero Section ======= -->
  <section class="d-flex align-items-center">

    <div class="container">
      <div class="loginBox bg-white">
        <div class="row">
          <div class="col-lg-7 d-flex order-1 order-lg-1" data-aos="zoom-in" data-aos-delay="200">
            <div class="gradient-custom-2">
              <div class="logowho text-center"><img src="./assets/img/whoLogo.png"></div>
            <h2 class="text-center text-light mt-4"><strong>Integrated care for older people.</strong></h2>

            </div>






          </div>





          <div class="col-lg-5 d-flex flex-column justify-content-center pr-4 pt-lg-0 order-2 order-lg-2" data-aos="fade-up" data-aos-delay="200">


            <div class="p-4">
              <h1 class="text-center mt-4 mb-4"><strong>ICOPE</strong></h1>
            <form method="POST" action="{{route('validateOtp')}}" id="signWithOtp">

                @csrf

              <h6 class="text-center">Please Login to your Account.</h6>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="loginName"><small>Email</small></label>
                <input type="email" id="loginName" name="email" autocomplete="false" class="form-control" />
                <small id="emailHelp" class="form-text text-muted text-right"></small>
                <span class="text-danger" id="emailErrorMsg"></span>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4 hide" id="otp">
                <label class="form-label" for="loginPassword"><small>OTP</small></label>
                <input type="text" id="loginPassword" autocomplete="false" name="otp"  class="form-control" />
                <div class="row mt-2">
                  <div class="col-sm-6"><small><span class="text-danger" id="otpError"></span></small></div>
                  <div class="col-sm-6 text-end"><small style="font-size: 11px;"><span id="timer" class="text-end"></span></small></div>
                </div>

              </div>

              <!-- 2 column grid layout -->
              <div class="row mb-4">






              </div>

              <!-- Submit button -->
              <div class="row">
              <div class="col-md-6 text-start mt-2">
                  <!-- Simple link -->

                  <a href="#" class="btn-thm " id="send" class="" disabled><small>SEND OTP</small></a>
                </div>
                <div class="col-lg-6 text-end hide" id="sign"><button type="submit" class="btn-thm">SIGN IN</button></div>

              </div>

              <!-- Register buttons -->
              <div class="text-center mt-4">
                {{-- <p>Not a member? <a href="#!">Register</a></p> --}}
              </div>
            </form>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section><!-- End Hero -->





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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var timeLeft = 30;
    var timer;
var elem = document.getElementById('timer');
$("#send").click(function(){
clearTimeout(timer);
document.getElementById("loader").style.display = "block";
var email = $('#loginName').val();
// $('#loginName').attr('disabled',true)
var token ='<?php echo csrf_token() ?>';
$.ajax({
        url : "{{ route('getOTP') }}",
        data : {'email' : email,'_token': token},
        type : 'post',
        success : function(result){
            if(result.status==1){
                document.getElementById("loader").style.display = "none";
                $('#sign').removeClass('hide');
                $('#otp').removeClass('hide');
                // $('#otp').val(result.otp);
                // $('#resend').removeClass('hide');
                $('#emailErrorMsg').empty();
                if (timeLeft < 30) {
                    timeLeft = 30;
                    $('#timer').removeClass('hide');
                }
                timer = setInterval(function() {countdown();}, 1000);
                $('#send').addClass('resendOtp hide');
                $('#emailHelp').removeClass('hide');
                $('#emailHelp').html('<p style="margin-bottom: 0;">'+email+'</p>'+' <a href="#" onclick=editEmail("'+email+'");>Edit Email</a>');
                $('#loginName').attr('type', 'hidden');
                toastr.success('OTP send successfully.');

            }
        },
        error: function(data) {
                $('#emailErrorMsg').text(data.responseJSON.errors.email);
                document.getElementById("loader").style.display = "none";
            }
    });
});
function editEmail(email){
    $('#emailHelp').addClass('hide');
    $('#loginName').attr('type', 'email');
    $('#sign').addClass('hide');
    $('#send').removeClass('resendOtp hide');
    $('#otp').addClass('hide');
    clearTimeout(timer);
    $('#timer').addClass('hide');
    document.getElementById('send').innerHTML='SEND OTP';
}
function countdown() {
    if (timeLeft == -1) {
        clearTimeout(timer);
        doSomething();
    } else {
        elem.innerHTML = timeLeft + ' seconds remaining';
        timeLeft--;
    }
}
function doSomething() {
    $('#send').removeClass('hide');
    document.getElementById('send').innerHTML='RESEND OTP';
    $('#timer').addClass('hide');
}






$(document).ready(function() {
  $("#signWithOtp").on('submit', (function(e) {
    e.preventDefault();
    $.ajax({
      url: $(this).attr('action'),
      type: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(response) {
        console.log(response);
        if(response.success==0){
            $('#otpError').html(response.message);
        }else{
            $(location).attr('href', "{{route('user.module')}}");
        }
      },
      error: function(e) {

      }
    });
  }));
});
</script>
</body>

</html>
