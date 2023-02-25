@extends('layouts.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-10">
    <div class="card">
      <div class="card-body">
        <div class="text-right align-items-center justify-content-end mt-10">
            <a class="btn btn-sm btn-info" href="#" onclick="addAssessment();">Add New Assessment</a>
            {{-- <a class="btn btn-sm btn-info" href="#" onclick="addModule();">List</a> --}}

        </div>
        <br>
        <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-bordered" id="assessment">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Options</th>
                        <th class="dt-control" style="width: 200px !important ">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.modal')
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>

<script>

    $('#add-assessment').submit(function(event) {
        event.preventDefault();
        var msg ='';
        // alert($(".aopt:checkbox:checked").length);
        if($(".aopt:checkbox:checked").length == 0){
            $msg = 'please select at least one correct answer';
            toastr.warning($msg);
        }else{
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: '{{ route('assessment.add',["type"=>$type]) }}',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                toastr.success("success");
                $('#assessment').DataTable().ajax.reload();
                $('.add-assessment').modal('hide');
                // $('.assessment').modal('show');

            },
            error: function(data) {
                $('#asstitleErr').text(data.responseJSON.errors.title);
            }
        });
    }
    });
</script>
<script type="text/javascript">
$(function () {
    var table = $('#assessment').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            "bDestroy": true,
            ajax: "{{ route($type.'-assessment',["type"=>$type]) }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'option', name: 'option'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
});

function editAssessment(id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('getAssessmentById') }}?id=" + id,
                success: function(data) {
                    console.log(data);
                    $('#addMoreAss').empty();
                    $("input[name='id']").val(data.id)
                    $("input[name='title']").val(data.title)
                    $.each(data.aoptions, function (key, val) {
                        newRowAdd =
                        '<input name=options['+key+'][id] type="hidden" value="'+val.id+'">'+
                        '<div class="row optAss" style="margin-bottom: 10px"><div class="col-lg-10">' +
                        '<input id="propertytype_other" name=options['+key+'][option] type="text" value="'+val.option+'" placeholder="option '+parseInt(key+1)+'" class="form-control">' +
                        '</div><div class="col-lg-2">' +
                        '<input type="checkbox" id="fmane" value="yes" name=options['+key+'][correct] class="aopt">' +
                        '</div> </div>';
                        $('#addMoreAss').append(newRowAdd);
                    });

                    // $("#uid").val(id);
                    $('.add-assessment').modal('show');
                }
            });
        }


    function addAssessment(){ ;
        $('#add-assessment').trigger("reset");
        $("input[name='id']").val(0);
        $("input[name='module_id']").val(0);
        $('.assessment').modal('hide');
        $('.add-assessment').modal('show');
    }
    $.fn.addMore = function(elem) {
        var len = this.parent().find('.optAss').length+1;
        if(len <= 7){
            newRowAdd =
            '<div class="row optAss" style="margin-bottom: 10px"><div class="col-lg-10">' +
            '<input id="propertytype_other" name=options['+len+'][option] placeholder="option '+len+'" type="text" value="" class="form-control">' +
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
  </script>
@endsection

