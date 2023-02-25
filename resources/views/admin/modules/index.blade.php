@extends('layouts.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-10">
    <div class="card">
      <div class="card-body">
        <div class="text-right align-items-center justify-content-end mt-10">
            <a class="btn btn-sm btn-info" href="#" onclick="addModule();">Add New Module</a>
            {{-- <a class="btn btn-sm btn-info" href="#" onclick="addModule();">List</a> --}}

        </div>
        <br>
        <div class="row">
        <div class="col-sm-12 table-responsive">
        <table class="table table-striped table-bordered table-responsive" id="module" style="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    {{-- <th>Vedio Link</th>
                    <th>Presentation Link</th> --}}
                    {{-- <th>Detail</th> --}}
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
  <script>

    $('#uploadform').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: '{{ route('modules.upload.images') }}',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        beforeSend:function(){
            $('#success').empty();
            $('.progress-bar').text('0%');
            $('.progress-bar').css('width', '0%');
        },
        uploadProgress:function(event, position, total, percentComplete){
            $('.progress-bar').text(percentComplete + '0%');
            $('.progress-bar').css('width', percentComplete + '0%');
        },
        success:function(data)
        {
            if(data.success)
            {
                $('#success').html('<div class="text-success text-center"><b>'+data.success+'</b></div><br /><br />');
                $('#success').append(data.image);
                $('.progress-bar').text('Uploaded');
                $('.progress-bar').css('width', '100%');
            }
        }
    });
});
</script>
<?php
   if(isset($_GET['addAssessment']) && $_GET['addAssessment']==1){?>
    <script>
        $('.add-assessment').modal('show');
       </script>

   <?php
    }
 ?>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
<script>
    function addModule(){
         $('#add-module').trigger("reset");
        $("input[name='id']").val(0)
        // $("textarea[name='detail']").val('')
        $('.add-module').modal('show');
    }
</script>
<script>
    $('#add-module').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: '{{ route('modules.add') }}',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                toastr.success("success");
                $('#module').DataTable().ajax.reload();
                $('.add-module').modal('hide');

            },
            error: function(data) {
                $('#titleErr').text(data.responseJSON.errors.title);
                $('#descErr').text(data.responseJSON.errors.description);
                $('#detailErr').text(data.responseJSON.errors.detail);
            }
        });

    });
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
                    toastr.success("success");
                    $('#assessment').DataTable().ajax.reload();
                    $('.add-assessment').modal('hide');
                    $('.assessment').modal('show');

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
<script type="text/javascript">
$(function () {
    var table = $('#module').DataTable({
    processing: true,
    serverSide: true,
    responsive:true,
    ajax: "{{ route('modules') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'title', name: 'title'},
        {data: 'description', name: 'description'},
        // {data: 'vdo_link', name: 'vdo_link'},
        // {data: 'presentation_link', name: 'presentation_link'},
        // {data: 'detail', name: 'detail'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    // dom: 'Bfrtip',
    // buttons: {
    //     buttons: [
    //         {
    //             text: "Add New Module",
    //             className: 'btn',
    //             action: function ( e, dt, node, config ) {
    //                 addModule();
    //             }
    //         }
    //     ]
    // }
});
});

function editModule(id) {
            $.ajax({
                type: 'GET',
                url: "{{ route('getModuleById') }}?id=" + id,
                success: function(data) {
                    console.log(data);
                    $("input[name='id']").val(data.id)
                    $("input[name='title']").val(data.title)
                    $("input[name='description']").val(data.description)
                    $("input[name='vdo_link']").val(data.vdo_link)
                    $("input[name='presentation_link']").val(data.presentation_link)
                    $("input[name='sequences']").val(data.sequences)
                    //$('#summernote').summernote('code', data.detail)

                    // $("#uid").val(id);
                    $('.add-module').modal('show');
                }
            });
        }
    function assessment(mid){
        $(function () {
            $("input[name='module_id']").val(mid) //set module id in add module modal form
            var table = $('#assessment').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            "bDestroy": true,
            ajax: "{{ route('assessment') }}?mid="+mid,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'title', name: 'title'},
                {data: 'option', name: 'option'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        });
        $('.assessment').modal('show');
    }

    function addAssessment(){
        window.location.href + "?addAssessment=1";
        $('#add-assessment').trigger("reset");
        $("input[name='id']").val(0)
        $('.assessment').modal('hide');
        $('.add-assessment').modal('show');
    }
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
                        '<input id="propertytype_other" name=options['+key+'][option] type="text" placeholder="option '+perseInt(key+1)+'" value="'+val.option+'" class="form-control">' +
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
  </script>
<?php
if(isset($_GET['show']) && $_GET['show']=='assessment'){ ?>
 <script>
  assessment(<?=$_GET['mid'];?> );
</script>
<?php } ?>
  @endphp


@endsection

