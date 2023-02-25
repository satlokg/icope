@extends('layouts.user')
@section('js')

@endsection
@section('content')
@include('layouts/partials/slider')
<main id="main">


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">



        <div class="row">
          <div class="col-md-4 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon mb-4"><img class="w-100" src="{{asset('assets/img/abt1.jpg')}}" /></div>
              <h4 class="text-center">Lorem Ipsum</h4>
              <p class="text-center">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon mb-4"><img class="w-100" src="{{asset('assets/img/abt2.jpg')}}" /></div>
              <h4 class="text-center">Sed ut perspici</h4>
              <p class="text-center">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-4 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon mb-4"><img class="w-100" src="{{asset('assets/img/abt3.jpg')}}" /></div>
              <h4 class="text-center">Magni Dolores</h4>
              <p class="text-center">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->



  </main><!-- End #main -->
@endsection
