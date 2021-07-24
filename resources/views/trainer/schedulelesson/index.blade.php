@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

                                    <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">Schedule a live lesson</h3>
            <div class="float-right">
    <a href="{{ route('tadd_live_lesson_slots') }}" class="btn btn-success">Add new</a>

</div>
    </div>
<div class="card-body">
<div class="row">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
<div class="col-12 col-lg-6 form-group">
    <label for="lesson_id" class="control-label">lesson</label>
    <select class="form-control select2 js-example-placeholdere-single1 select2bs4" id="lesson_id" name="lesson_id" tabindex="-1" aria-hidden="true">
        @foreach ($getlesson as $cour)
            <option value="">please select one....</option>
            <option value="{{ $cour->id }}">{{ $cour->title }}</option>
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
                    <th >scheduling</th>
                    <th >lesson</th>
                    <th >Password - if not entered, the default is 123456</th>
                    <th >duration (minutes)</th>
                    <th >date</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($lesson as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->lesson_id }}</td>
                    <td>123456</td>
                    <td>{{ $val->duration }}</td>
                    <td>{{ $val->date }}</td>
                    <td>
                        <a href="{{route('tedit_live_lesson_slots',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('tdestroy_live_lesson_slots',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>

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
                    url: "{{url('/tranier/delete-live-lesson-slots')}}/" + id,
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
    document.getElementById('lesson_id').onchange = function() {
    window.location = "{!! url()->current() !!}?lesson_id=" + this.value;
    };
</script>
@endsection
