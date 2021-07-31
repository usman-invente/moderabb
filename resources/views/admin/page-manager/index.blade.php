@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

        <div class="row">
            @if (session('error') || session('message'))
            <div class="alert alert-success" style=" width: 100%;">
            <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
        </div>
        @endif
<div class="card" style="width: 100%"> 
    <div class="card-header">
        <h3 class="page-title float-left d-inline">Pages</h3>
                    <div class="float-right">
            <a href="{{ route('add_pages') }}" class="btn btn-success">Add new</a>
        
        </div>
            </div>
            <div class="card-body">
                <div class="row">
                 
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                <table id="myTable" class="table table-bordered table-striped dataTable no-footer"
                                    role="grid" aria-describedby="myTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th>{{ __('lang.number') }}</th>
                                            <th>{{ __('lang.title') }}</th>
                                            <th>{{ __('lang.Status') }}</th>
                                            <th>{{ __('lang.Actions') }}</th>
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
{{--  <div class="card-body">
    

<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                <tr role="row">
                    <th >Number</th>
                    <th >Title</th>
                    <th >Status</th>
                    <th >Actions</th>
                </tr>
            </thead>
                <tbody>
                @foreach ($sponsor as $val)
                <tr class="row-{{$val->id}}" id="row-{{$val->id}}">
                    <td>{{ $val->id }}</td>
                    <td>{{ $val->title }}</td>
                    <td>@if($val->published == 0)
                        <p class="text-white mb-1 font-weight-bold text-center bg-dark p-1 mr-1"> not published</p>
                        @endif
                        @if($val->published == 1)
                        <p class="text-white mb-1 font-weight-bold text-center bg-warning p-1 mr-1">published</p>
                        @endif
                    </td>
                    <td>
                       <a href="{{route('edit_pages',$val->id)}}" class="btn btn-info mb-1" ><i class="fas fa-edit"></i></a>
                        <a class="btn btn-danger mb-1" href="javascript:void(0);"data-id="{{ $val->id }}" data-action="{{ route('destroy_pages',$val->id) }}" onclick="deleteConfirmation({{$val->id}})"><i class="fa fa-trash"></i><a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table></div>
    </div>
    </div>
</div>
</div>  --}}
</div>

        </div><!--animated-->
    </div><!--container-fluid-->
</main>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    "url": "{{ route('admin.getPage') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                "columns": [{
                        "data": "number"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "published"
                    },
                    {
                        "data": "actions"
                    },




                ]

            });
        });
    </script>
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var parent = $(this).parent().parent();
            swal({
                    title: "Are you sure?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        //console.log("sdsd");

                        $.ajax({
                            type: "POST",
                            url: "{{ route('destroy_pages') }}",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(data) {
                                // alert(data);
                                swal("Updated", "", "success");
                               window.location.href="";
                            }
                        }); // submitting the form when user press yes
                    } else {
                        swal("Cancelled", "Your record  is safe :)", "info");
                    }
                });

        });
    </script>
@endsection
