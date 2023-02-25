@extends('layouts.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-10">
    <div class="card">
      <div class="card-body">
        <div class="text-right align-items-center justify-content-end mt-10">
            {{-- <a class="btn btn-sm btn-info" href="#" onclick="addModule();">List</a> --}}

        </div>
        <br>
        <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped table-bordered" id="users">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Created At</th>
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

@endsection

@section('css')

@endsection
@section('js')
<script type="text/javascript">
$(function () {
    var table = $('#users').DataTable({
            processing: true,
            serverSide: true,
            stateSave: true,
            "bDestroy": true,
            ajax: "{{ route('users') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'email', name: 'title'},
                {data: 'created_at', name: 'created_at'},
            ]
        });
});



  </script>
@endsection

