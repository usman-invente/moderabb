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
<h3 class="page-title float-left d-inline">Lessons</h3>
            <div class="float-right">
    <a href="{{ route('add_lessons') }}" class="btn btn-success">Add new</a>

</div>
    </div>
<div class="card-body">
<div class="row">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
<div class="col-12 col-lg-3 form-group" style="margin-left: 17px">
    <label for="course_id" class="control-label">course</label>
    <select class="form-control select2 js-example-placeholdere-single select2bs4" id="course_id" name="course_id" tabindex="-1" aria-hidden="true">
        @foreach ($course as $cour)
            <option value="">please select one....</option>
            <option value="{{ $cour->id }}">{{ $cour->ctitle }}</option>
        @endforeach
    </select>
    </div>
</div>
<div class="d-block">
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th >Number</th>
                    <th >Title</th>
                    <th >Published</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($lesson as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->title }}</td>
                    <td>@if($val->published == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1">published</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('edit_lessons',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('destroy_lessons',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>

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
                    url: "{{url('/delete-lessons')}}/" + id,
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
 <script>
    document.getElementById('course_id').onchange = function() {
    window.location = "{!! url()->current() !!}?course_id=" + this.value;
    };
</script>
@endsection
