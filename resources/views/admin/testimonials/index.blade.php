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
                                <th>{{ __('lang.Name') }}</th>
                                <th>{{ __('lang.Title') }}</th>
                                <th>{{ __('lang.Contains') }}</th>
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

</div>
</div>

    </div><!--animated-->
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    "url": "{{ route('admin.getTestimonials') }}",
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
                        "data": "name"
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "content"
                    },
                    {
                        "data": "status"
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
                            url: "{{ route('destroy_testimonials') }}",
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
    <script>
        $(document).on('click', '.status', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var parent = $(this).parent().parent();


            swal({
                    title: "Are you sure?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        //console.log("sdsd");

                        $.ajax({
                            type: "POST",
                            url: "{{ route('feature_testimonials') }}",
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
