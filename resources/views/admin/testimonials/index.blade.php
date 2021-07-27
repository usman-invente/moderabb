@extends('layouts.app')

@section('content')
<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 39px !important;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-selection--multiple .select2-selection__rendered {
        box-sizing: border-box;
        list-style: none;
        margin: 0;
        padding: 0 5px;
        width: 100%;
        height: 38px !important;
    }
</style>
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

                                    <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">They said about the language trainer platform</h3>
            <div class="float-right">
    <a href="{{ route('add_testimonials') }}" class="btn btn-success">Add new</a>

</div>
    </div>
<div class="card-body">
<div class="row">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
</div>
<div class="d-block">
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th >Number</th>
                    <th >Name</th>
                    <th >Title</th>
                    <th >Content</th>
                    <th >Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($testi as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->title }}</td>
                    <td>{{ $val->content }}</td>
                    <td>@if($val->status == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1">Enable</p>
                        @elseif($val->status == 0)
                        <p class="text-white mb-1 font-weight-bold text-center bg-info p-1 mr-1">Disable</p>
                        @endif
                    </td>
                    <td>
                        <a class="btn mb-1 mr-1 btn-danger" href="javascript:void(0);" data-id="1" data-action="{{ route('feature_testimonials',$val->id) }}" onclick="featureConfirmation(1)"><i class="fa fa-power-off"></i></a>
                        <a href="{{route('edit_testimonials',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('destroy_testimonials',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>

                </tr>
                @endforeach
                </tbody>
            </table></div>
    </div>
</div>


</div>
</div>

    </div><!--animated-->
</div>

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
                    url: "{{url('/delete-testimonials')}}/" + id,
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
 <script type="text/javascript">

    function featureConfirmation(id) {
        swal({
            title: "Are you sure?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Feature it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: "{{url('/feature-testimonials')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            {{--  swal("Done!", results.message, "success");  --}}
                            // toastr.success('Success!', 'Comp deleted successfully');
                            window.location = '{{ route('courses') }}'
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
