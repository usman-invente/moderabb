@extends('layouts.app')

@section('content')
<main class="main">
                                

    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                    
<div class="card">
<div class="card-header">
                <h3 class="page-title d-inline">Update our partners</h3>
    <div class="float-right">
        <a data-toggle="" id="createCatBtn" data-target="#createCat" href="{{ route('sponsors') }}" class="btn btn-success collapsed" aria-expanded="false">View</a>

    </div>

</div>
<div class="card-body">
<div class="row" id="createCat" style="">
    <div class="col-12">
    <form method="POST" action="{{ route('update_sponsors',$data->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf    
        <div class="row">
            <div class="col-lg-4 col-12 form-group mb-0">
                <label for="name" class="control-label">name *</label>
                <input class="form-control" placeholder="name" value="{{ $data->name }}" name="name" type="text" id="name">

            </div>
            <div class="col-lg-4 col-12 form-group mb-0">
                <label for="link" class="control-label">link</label>
                <input class="form-control" placeholder="link" name="link" value="{{ $data->link }}" type="text" id="link">
            </div>

            <div class="col-lg-4 col-12 form-group mb-0">

                <label for="logo" class="control-label d-block">logo</label>
                <input class="form-control d-inline-block" placeholder="" name="logo" type="file" id="logo">
                <img src="{{asset('upload/partner/'.$data->logo)}}" height="80" width="180" style="margin-top: 10px">
            </div>
            <div class="col-12 form-group mt-3 text-center  mb-0 ">

                <input class="btn mt-auto  btn-danger" type="submit" value="update">
            </div>
        </div>

        </form>
            <hr>


    </div>

</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th >Number</th>
                    <th >Name</th>
                    <th >Logo</th>
                    <th >Link</th>
                    <th >Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($sponsor as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td><img src="{{asset('upload/partner/'.$val->logo)}}" height="80" width="180" style="margin-top: 10px"></td>
                    <td>{{ $val->link }}</td>
                    <td>@if($val->status == 0)
                        <p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1">Disabled</p>
                        @endif
                        @if($val->status == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">Enabled</p>
                        @endif
                    </td>
                    <td>
                        <a class="btn mb-1 mr-1 btn-danger" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('feature_sponsor',$val->id) }}" onclick="featureConfirmation({{$val->id}})"><i class="fa fa-power-off"></i><a>
                        <a href="{{route('edit_sponsors',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('destroy_sponsors',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table></div>
    </div>
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
                    url: "{{url('/delete-sponsors')}}/" + id,
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
                    url: "{{url('/feature-sponsors')}}/" + id,
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
