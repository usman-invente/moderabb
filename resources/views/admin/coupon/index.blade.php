@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                        <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">Coupon</h3>
    <div class="float-right">
        <a href="{{ route('add_coupon')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add Coupon</a>
    </div>
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
                    <th >number</th>
                    <th > Name</th>
                    <th >Coupon code</th>
                    <th >Type</th>
                    <th >amount</th>
                    <th >advertiser percentage</th>
                    <th >end in</th>
                    <th >status</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($tax as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->code }}</td>
                    @if($val->type == 1)
                    <td>discount rate (in %)</td>
                    @else 
                    <td>rate</td> 
                    @endif
                    <td>{{ $val->amount }}</td>
                    <td>{{ $val->advert_perce }}</td>
                    <td>{{ $val->expires_at }}</td>
                    @if($val->status == 0)
                    <td><span class="badge bg-warning">Disabled<span></td>
                    @else 
                    <td><span class="badge bg-success">Enabled<span></td> 
                    @endif
                    <td>
                        
                        <a class="btn mb-1 btn-danger" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('coupon_status',$val->id) }}" onclick="coupon_status_Confirmation({{$val->id}})"><i class="fa fa-power-off"></i><a>
                        <a href="{{route('edit_coupon',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('destroy_coupon',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>
                        
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
                    url: "{{url('/delete-coupon')}}/" + id,
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

    function coupon_status_Confirmation(id) {
        swal({
            title: "Are you sure?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Enabled it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'GET',
                    url: "{{url('/coupon-status')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {
                        if (results.success === true) {
                            {{--  swal("Done!", results.message, "success");  --}}
                            // toastr.success('Success!', 'Comp deleted successfully');
                            window.location = '{{ route('coupon') }}'
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
