@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                        <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">Programs and Diplomas</h3>
    {{--  <div class="float-right">
        <a href="{{ route('cadd_diploma')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
    </div>  --}}
</div>
<div class="card-body">
<div class="row">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th >Number</th>
                    <th >Title</th>
                    <th >Category</th>
                    <th >Price $</th>
                    <th >Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($data as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->title }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->price }}</td>
                    <td>@if($val->published == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1">published</p>
                        @endif
                        @if($val->featured == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">featured</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('cedit_diploma',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('cdestroy_diploma',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>

                </tr>
                @endforeach
                </tbody>
            </table></div>
    </div>
</div>
</div>
</div>

        </div><!--animated-->
    </div><!--container-fluid-->
</main>

<script type="text/javascript">

    function deleteConfirmation(id) {
        swal({
            title: "Are you sure?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: "{{url('/contractor/delete-bundles')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                            // toastr.success('Success!', 'Comp deleted successfully');
                                 $(".row-"+id.toString()).remove();
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
 </script>
@endsection
