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
                        <h3 class="page-title float-left d-inline">{{ __('lang.Trainer') }}</h3>
                        <div class="float-right">
                            <a href="{{ route('add_teacher') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                                {{ __('lang.Add Trainers') }}</a>
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
                                                    <th>{{ __('lang.first name') }}</th>
                                                    <th>{{ __('lang.surname') }}</th>
                                                    <th>{{ __('lang.email address') }}</th>
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
            }).then(function(e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'GET',
                        url: "{{ url('/delete-teachers') }}/" + id,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                // toastr.success('Success!', 'Comp deleted successfully');
                                $(".row-" + id.toString()).remove();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function(dismiss) {
                return false;
            })
        }
    </script>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "ajax": {
                    "url": "{{ route('admin.getTeacher') }}",
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
                        "data": "email"
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
                            url: "{{ route('destroy_teacher') }}",
                            data: {
                                '_token': "{{ csrf_token() }}",
                                id: id
                            },
                            success: function(data) {
                                // alert(data);
                                swal("Updated", "", "success");
                                parent.fadeOut('slow', function() {
                                    $(this).remove();
                                });
                            }
                        }); // submitting the form when user press yes
                    } else {
                        swal("Cancelled", "Your record  is safe :)", "info");
                    }
                });

        });
    </script>


@endsection
