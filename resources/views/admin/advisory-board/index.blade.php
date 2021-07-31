@extends('layouts.app')

@section('content')
    <main class="main">

        <div class="container-fluid" style="padding-top: 30px">
            <div class="animated fadeIn">
                <div class="content-header">
                </div>
                <!--content-header-->

                    @if (session('error') || session('message'))
                        <div class="alert alert-success" style=" width: 100%;">
                            <span
                                class="{{ session('error') ? 'error' : 'success' }}">{{ session('error') ?? session('message') }}</span>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title d-inline">create advisory body</h3>
                            <div class="float-right">
                                <a data-toggle="collapse" id="createCatBtn" data-target="#createCat" href="#"
                                    class="btn btn-success collapsed" aria-expanded="false">Add new</a>

                            </div>

                        </div>
                        <div class="card-body">

                            <div class="row collapse" id="createCat" style="">
                                <div class="col-12">
                                    <form method="POST" action="{{ route('create_advisoryboards') }}"
                                        accept-charset="UTF-8" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-12 form-group mb-0">
                                                <label for="name" class="control-label">name *</label>
                                                <input class="form-control" placeholder="name" name="name" type="text"
                                                    id="name" required>

                                            </div>
                                            <div class="col-lg-4 col-12 form-group mb-0">
                                                <label for="name" class="control-label">position *</label>
                                                <input class="form-control" placeholder="position" name="position"
                                                    type="text" id="position" required>

                                            </div>
                                            <div class="col-lg-4 col-12 form-group mb-0">
                                                <label for="link" class="control-label">web-link</label>
                                                <input class="form-control" placeholder="link" name="web_link" type="text"
                                                    id="link" required>
                                            </div>

                                            <div class="col-lg-4 col-12 form-group mb-0">

                                                <label for="logo" class="control-label d-block">logo</label>
                                                <input class="form-control d-inline-block" placeholder="" name="logo"
                                                    type="file" id="logo" required>
                                            </div>
                                            <div class="col-12 form-group mt-3 text-center  mb-0 ">

                                                <input class="btn mt-auto  btn-danger" type="submit" value="Save">
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
                                            <table id="myTable" class="table table-bordered table-striped dataTable no-footer"
                                                role="grid" aria-describedby="myTable_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>{{ __('lang.number') }}</th>
                                                        <th>{{ __('lang.Name') }}</th>
                                                        <th>{{ __('lang.Position') }}</th>
                                                        <th>{{ __('lang.Logo') }}</th>
                                                        <th>{{ __('lang.Web-Link') }}</th>
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

               
                <!--animated-->
            </div>
            <!--container-fluid-->
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
                    "url": "{{ route('admin.getAdvisoryboards') }}",
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
                        "data": "position"
                    },
                    {
                        "data": "logo"
                    },
                    {
                        "data": "web_link"
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
                            url: "{{ route('destroy_advisoryboards') }}",
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
                            url: "{{ route('feature_advisoryboards') }}",
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
