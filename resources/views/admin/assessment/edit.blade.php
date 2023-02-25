@extends('layouts.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-10">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Assessment</h4>
              <form class="forms-sample" id="add-assessment">
                  @csrf
                  <input type="hidden" id="ass_id" name="id" value="{{$assessment->id}}">
                  <input type="hidden" id="module_id" name="module_id" value="{{$assessment->module_id}}">
              <div class="col-lg-12">
                  <div class="form-group">
                      <label for="assTitle">Assessment Title</label>
                      <p class="asstitleErr"></p>
                      <input type="text" class="form-control" id="assTitle" placeholder="Assessment Title" value="{{$assessment->title}}" name="title">
                  </div>
                  <div class="form-group">
                    <label for="assTitle">Sequence</label>
                    <p class="asstitleErr"></p>
                    <input type="number" class="form-control" value="{{$assessment->sequences}}" name="sequences">
                </div>
              </div>
              <div class="col-lg-12">
                  <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Options</legend>
                      <div id="addMoreAss">
                        @foreach($assessment->aoptions as $key=>$value)
                        <input type="hidden" name="options[0][id]" value="{{$value->id}}">
                        <div class="row optAss" style="margin-bottom: 10px">
                          <div class="col-lg-10">
                              <input id="propertytype_other" name="options[{{$key}}][option]" type="text" placeholder="option 1" value="{{$value->option}}" class="form-control">
                          </div>
                          <div class="col-lg-2">
                              <input type="checkbox" id="fmane" value="yes" name="options[{{$key}}][correct]" {{($value->correct == 'yes')?'checked':''}} class="aopt">
                          </div>
                        </div>
                        @endforeach
                        {{-- <div class="row optAss" style="margin-bottom: 10px">
                          <div class="col-lg-10">
                              <input id="propertytype_other" name="options[1][option]" type="text" value="" placeholder="option 2" class="form-control">
                          </div>
                          <div class="col-lg-2">
                              <input type="checkbox" id="fmane" value="yes" name="options[1][correct]" class="aopt">
                          </div>
                        </div> --}}
                      </div>
                        <button type="button" class="btn btn-sm btn-success" onclick="$(this).addMore()">Add More</button>
                        <button type="button" class="btn btn-sm btn-danger" onclick="$(this).removeLast()">Remove Last</button>
                  </fieldset>


              </div>
              <br>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> --}}
            </form>
          </div>
    </div>
  </div>
  @include('admin.modal')
@endsection

@section('css')
<style>
    .note-editor.note-frame .note-editing-area .note-editable {
    padding: 10px;
    overflow: auto;
    word-wrap: break-word;
    background-color: #fff;
}
.note-editor .note-toolbar, .note-popover .popover-content {
    margin: 0;
    padding: 0 0 5px 5px;
    background-color: #fff;
    border-bottom: 1px solid #ccc;
}
</style>
<style>

    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        width: -webkit-fill-available;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width:auto;
            padding:0 1px;
            border-bottom:none;
        }


</style>
@endsection
@section('js')
<script type="text/javascript">

        $.fn.addMore = function(elem) {
            var len = this.parent().find('.optAss').length+1;
            if(len <= 7){
                newRowAdd =
                '<div class="row optAss" style="margin-bottom: 10px"><div class="col-lg-10">' +
                '<input id="propertytype_other" name=options['+len+'][option] type="text" value="" placeholder="option '+len+'" class="form-control">' +
                '</div><div class="col-lg-2">' +
                '<input type="checkbox" id="fmane" value="yes" name=options['+len+'][correct] class="aopt">' +
                '</div> </div>';
                this.parent().find('#addMoreAss').append(newRowAdd);
            }else{
                toastr.success("you reached maximum level");
            }


        }
        $.fn.removeLast = function(elem) {
            var len = this.parent().find('.optAss').length;

            if(len > 2){
             this.parent().find('.optAss').last().remove();
            }else{
                toastr.success("You can't remove");
            }

        }
        $('#add-assessment').submit(function(event) {
        event.preventDefault();
        var msg ='';
        // alert($(".aopt:checkbox:checked").length);
        if($(".aopt:checkbox:checked").length == 0){
            $msg = 'please select at least one correct answer';
            toastr.warning($msg);
        }else{
        var formData = new FormData(this);
            $.ajax({
                url: '{{ route('assessment.add') }}',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    toastr.success("success");
                    $(location).attr('href', "{{route('modules')}}?show=assessment&mid="+data.module);
                    // $('#assessment').DataTable().ajax.reload();
                    // $('.add-assessment').modal('hide');
                    // $('.assessment').modal('show');

                },
                error: function(data) {
                    msg += '\n'+ data.responseJSON.errors.title;
                    toastr.warning(msg);
                    // $('#asstitleErr').text(data.responseJSON.errors.title);
                }
            });
        }

    });
      </script>
@endsection

