@extends('layouts.user')
@section('js')
<script>
$(document).ready(function() {
  $("#getAssessment").on('click', (function(e) {
    $.ajax({
      url: "{{route('user.getAssessmentByModuleId',['module_id'=>$mid])}}",
      type: "GET",
      success: function(response) {
        var html = '';
        $.each( response.data, function( index, value ){
            html += '<div class="col-md-12 align-items-stretch aos-init aos-animate mt-4" data-aos="zoom-in" data-aos-delay="100">';
            html +='<p><strong>'+parseInt(index+1)+'-'+ value.title+ ' ?</strong></p>';
            $.each( value.aoptions, function( i, v ){
                html +='<div class="form-check ">';
                html +='<input class="form-check-input" type="radio" name="data['+v.id+'][option_id]" value="'+v.id+'" id="flexRadioDefault1">';
                html +='<label class="form-check-label" for="flexRadioDefault1">';
                html += v.option;
                html +='</label></div>';

            });


            html +='</div>';
        });
        $('.data').html(html);
        $('#assessmentModal').modal('show');
      },
      error: function(e) {

      }
    });
  }));
});

$(document).ready(function() {
  $("#subAssement").on('submit', (function(e) {
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
        if(response.success==false){
            var html = '<h4 class="text-danger">' +response.data['messages']+'</h4>';
            $('#success').html(html);
            $('#assessmentModal').modal('hide');
            $('#assessmentSuccess').modal('show');
        }else{
            // console.log(response.data['total_questions']);
            var html = '';
            html += '<div class="col-sm-12 mb-3"><div class="card bg-success"><div class="card-body"><h4 class="text-white text-center">Assessment Submitted Successfully</h4></div></div></div>';
            html += '<div class="col-sm-4"><small>Total Questions : </small><h4 class="text-primary">' +response.data['total_questions']+'</h4></div>';
            html += '<div class="col-sm-4"><small>Total Answered : </small><h4 class="text-warning">'+response.data['total_answered']+'</h4></div>';
            html += '<div class="col-sm-4"><small>Correct Answered : </small><h4 class="text-success">' +response.data['correct_anwswered']+'</h4></div>';
            $('#success').html(html);
            $('#assessmentModal').modal('hide');
            $('#assessmentSuccess').modal('show');
            // $(location).attr('href', "{{route('user.module')}}");
        }
      },
      error: function(e) {
        console.log(e);
      }
    });
  }));
});
</script>
<script>
    links = '{{$mod->presentation_link}}';
    linksRole = '{{$mod->vdo_link}}';
    var html = '';
    var numbersArray = links.split(',');
    var numbersArrayRole = linksRole.split(',');
    // console.log(numbersArray);
    if(numbersArray.length == 1){
      html += '<a href="'+links+'" target="_blank" class="presLink"><img class="butImg" src="{{asset('/assets/img/presLink.jpg')}}"/> Presentation </a>';
    }else{
      $.each(numbersArray, function(key, value){
        html += '<a href="'+value+'" target="_blank" class="presLink"><img class="butImg" src="{{asset('/assets/img/presLink.jpg')}}"/> Presentation '+(key+1)+' </a>';
      });
    }
    if(numbersArrayRole.length == 1){
      html += '<a href="'+links+'" target="_blank" class="videLink"><img class="butImg" src="{{asset('/assets/img/videLink.jpg')}}"/> Roleplay </a>';
    }else{
      $.each(numbersArrayRole, function(key, value){
        html += '<a href="'+value+'" target="_blank" class="videLink"><img class="butImg" src="{{asset('/assets/img/videLink.jpg')}}"/> Roleplay '+(key+1)+' </a>';
      });
    }
      $('#dyLink').html(html);
</script>
@endsection
@section('content')
<main id="main">
    <section id="about">
        <div class="mt-6" >

            {!!$mod->file_link!!}
         <div class="container carding mt-2" id="dyLink">



                {{-- <a href="#" onclick="openLink('{{$mod->presentation_link}}')" class="presLink"><img class="butImg" src="{{asset('/assets/img/presLink.jpg')}}"/> Presentation </a>
                <a href="#" onclick="openLink('{{$mod->vdo_link}}')" class="videLink"><img class="butImg" src="{{asset('/assets/img/videLink.jpg')}}"/> Roleplay </a> --}}
                {{-- <a href="#" class="asseLink" id="getAssessment"><small>Assessment</small></a> --}}

</div>

            <div class="container carding mt-2" >
              <div class="text-center"><h3 class="asses">Assesment</h3>  </div>
            <form action="{{route('user.submitAssessment')}}" method="post" id="subAssement">
                    @csrf

                <input type="hidden" name="module_id" value="{{$mid}}">
                @foreach ($assessment as $k=>$ass)
                <div class="row m-4 p-4 bg-light" style="border-radius:10px; ">
                <input type="hidden" name="data[{{$ass->id}}][assessment_id]" value="{{$ass->id}}">
                <div class="col-md-12 align-items-stretch aos-init aos-animate mt-4" data-aos="zoom-in" data-aos-delay="100" >
                    <p><span class="optBtn">{{$k+1}}</span><span style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size: 20px;">{{$ass->title}}?</p>
                    @foreach ($ass->aoptions as $ky=>$item)
                    <div class="form-check pl-4">
                        <input class="form-check-input" type="radio" name="data[{{$ass->id}}][option_id]" value="{{$item->id}}"  >
                        <label class="form-check-label" >
                          {{$item->option}}
                        </label>
                      </div>
                    @endforeach

                </div>
                   </div>
                @endforeach

                <br>
                <p class="text-center">
                <button type="submit" class="assesBtn">Submit</button></p>
                </form>
              </div>
        </div>
            <

        </div>
      </section>

    <!-- ======= About Us Section ======= -->


    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Modules</h2>
       </div>

        <div class="row">
        @if($module->count()!=0)
        @foreach ($module as $item)
        <a href="{{route('user.assessment',['mid'=>encrypt($item->id)])}}" class="col-lg-6 mt-4">
        <div>
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="{{asset('assets/img/m1.png')}}" class="img-fluid" alt=""></div>
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
    </section><!-- End Team Section --> --}}

  </main><!-- End #main -->
  {{-- <div class="modal fade" id="assessmentModal" tabindex="-1" role="dialog" aria-labelledby="assessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assessmentModalLabel">Assessment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$(this).closeModal('assessmentModal')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.submitAssessment')}}" method="post" id="subAssement">
            @csrf
      <div class="row">
        <input type="hidden" name="module_id" value="{{$mid}}">
        @foreach ($assessment as $k=>$ass)
        <input type="hidden" name="data[{{$ass->id}}][assessment_id]" value="{{$ass->id}}">
        <div class="col-md-12 align-items-stretch aos-init aos-animate mt-4" data-aos="zoom-in" data-aos-delay="100">
            <p><strong>{{$k+1}}. {{$ass->title}}?</strong></p>
            @foreach ($ass->aoptions as $item)
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="data[{{$ass->id}}][option_id]" value="{{$item->id}}" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  {{$item->option}}
                </label>
              </div>
            @endforeach


           </div>
        @endforeach
        </div>
        <br>
        <button type="submit" class="btn-thm float-end">Submit</button>
        </form>
      </div>

    </div>
  </div> --}}
</div>

<div class="modal fade" id="assessmentSuccess" tabindex="-1" role="dialog" aria-labelledby="assessmentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assessmentModalLabel">Assessment</h5>
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close" onclick="$(this).closeModal('assessmentSuccess')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row" id="success">

      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="assesBtn close" data-dismiss="modal" aria-label="Close" onclick="$(this).closeModal('assessmentSuccess')">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="openLink" tabindex="-1" role="dialog" aria-labelledby="assessmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="assessmentModalLabel">Assessment</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$(this).closeModal('openLink')">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body" id="YlINK">

    </div>
    <div class="modal-footer">
      <button type="button" class="assesBtn close" data-dismiss="modal" aria-label="Close" onclick="$(this).closeModal('openLink')">Close</button>
    </div>

  </div>
</div>
</div>
@endsection
