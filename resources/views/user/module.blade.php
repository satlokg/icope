@extends('layouts.user')
@section('js')

@endsection
@section('content')
<main id="main">

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg mt-6">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Modules</h2>
       </div>

        <div class="row">
        @if($module->count()!=0)
        @foreach ($module as $key=>$item)

        <a href="{{route('user.assessment',['mid'=>encrypt($item->id)])}}" class="col-lg-6 mt-4">
        <div>
            <div class="member align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src=<?php echo asset('assets/img/m'.($key+1).'.png');?> class="img-fluid" alt=""></div>
              <div class="member-info">
                <p><span class="modNum">{{$item->title}}</span></p>
                <h4>{{$item->description}}</h4>
                @if($item->is_attempted_count==0)
                <p><span><i class="bi bi-clock"></i> Pending</span></p>
                @else
                <p class="statusMod"><strong><i class="bi bi-clock"></i> Completed</strong></p>
                @endif
              </div>
            </div>
          </div>
        </a>
        @endforeach
        @else
        <p class="statusMod"><strong>No Module Available</p>
        @endif





        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection
