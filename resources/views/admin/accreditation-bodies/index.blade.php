@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->

                                        <div class="card">
<div class="card-header">
<h3 class="page-title float-left d-inline">{{ __('lang.Accreditation Bodies') }}</h3>
    <div class="float-right">
        <a href="{{ route('add_accreditation_bodies')}}" class="btn btn-success"><i class="fas fa-plus"></i> {{ __('lang.Add') }}</a>
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
                                        <table id="myTable" class="table table-bordered table-striped dataTable no-footer"
                                            role="grid" aria-describedby="myTable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th >{{ __('lang.number') }}</th>
                                                    <th >{{ __('lang.Authorizing authority') }}</th>
                                                    <th >{{ __('lang.Responsible Person') }}</th>
                                                    <th >{{ __('lang.email address') }}</th>
                                                    <th >{{ __('lang.status') }}</th>
                                                    <th >{{ __('lang.Actions') }}</th>
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
                "bStateSave": true,
                "retrieve": true,
                dom: 'Bfrtip',
                order: [
                    [0, "desc"]
                ],
                dom: 'lfBrtip',
                buttons: [
                        'excelHtml5',
                        'csvHtml5',
                        'pdfHtml5',
                        'selectAll',
                        ],
                "ajax": {
                    "url": "{{ route('admin.getAcbody') }}",
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
                        "data": "c_person"
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
                            url: "{{ route('destroy_accreditation_bodies') }}",
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

